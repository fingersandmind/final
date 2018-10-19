<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Classes;
use App\TeacherClass;
use App\Attendance;
use Carbon\Carbon;
use DB;

class ChartDataController extends Controller
{

    function getAllAttendanceMonth()
    {
        $month_array = array();

        $attendance = Attendance::get()->pluck('date');

        $attendances = json_decode($attendance);

        if( !empty($attendances) ){
            foreach( $attendances as $attendance ){
                // $format = 'd/m/Y';
                $dates = new Carbon($attendance->date);
                $month_no = $dates->format('m');
                $month_name = $dates->format('F');
                // $date = $dates->toDateTimeString();

                // $date = $attendance->date;
                $month_array[$month_no] = $month_name;
            }

        }

        return $this->teacherClasses(10);
        return $this->subjectData(10);
        return $this->getAllAttendanceByMonth(10);

        return $month_array;
    }

    function getAllAttendanceByMonth($month)
    {
        // $month = $this->getAllAttendanceMonth();

        $attendances = Attendance::whereMonth('date', $month)->get();


        // if( !empty($attendances) )
        // {
        //     foreach( $attendances as $attendance ){
        //         // $dates = new Carbon($attendance->date);
        //         $unformatted_time = new Carbon($attendance->time_in);
        //         $timeIn = $unformatted_time->toTimeString();
        //     }
        // }

        return $attendances;
    }


    function getAllSubject()
    {

        // $userId = auth()->user()->id; //getting the id of authenticated users.

        // $user = User::find($userId); //passing the above id as parameters to get the data of the authenticated user.

        //Using eloquent get the subjects of the current user to be passed in chart.

        $subjects = auth()->user()->subjects()->pluck('name'); 

        return $subjects;

    }


    public function loadChart()
    {
        $attendance_arr = array();

        $list_attendance = Attendance::whereMonth('date','11')
        ->whereYear('date','2018')
        ->with('attendances.subjClass')
        ->get();

        foreach($list_attendance as $attendance){
            
        }

        // return json_encode($attendance_arr);
        $list = json_decode( $list_attendance );

        return $list;


       // return AttendanceResource::collection($list_attendance);

    }
    function subjectData($month){
        $json = "";
        

        $teacherClasses = DB::table('users')
                            ->join('teacher_class', 'users.id', "=", 'teacher_class.user_id')
                            ->where('users.id', auth()->user()->id)
                            ->get();

        $subs = [];

        

        foreach ($teacherClasses as $classes) {
            $rawData = DB::table('attendances')
                ->join('teacher_class', 'teacher_class.id', "=", 'attendances.teacher_class_id')
                ->join('classes', 'classes.id', "=", 'teacher_class.classes_id')
                ->where('teacher_class.classes_id', $classes->classes_id)
                ->whereMonth('date', $month)
                ->get();
                // ->pluck('classes','name'); 

            $finalData =[];

            $lates_arr = array();
            $lates = 0;

            foreach($rawData as $items){        
                $date = $items->date;
                $classTime = new Carbon($items->time);
                $time_in = new Carbon($items->time_in);
                $timeIn = $time_in->toTimeString();
                $time_out = $items->time_out;
                $subject = $items->name;

                
                $absent = 0;

                

                $diff_in_minutes = $classTime->diffInMinutes($time_in);
                if( $diff_in_minutes = 5 || $diff_in_minutes <= 14  )
                {
                    $lates++;
                }
                

                array_push($lates_arr, $lates);




                array_push($finalData, [
                    'subject' => $subject,
                    'timeIn' => $timeIn,
                    'timeOut' => $time_out,
                    ]);
            }
            // return $lates;
            // return $rawData;
            array_push($subs, $finalData);

        }
       
        json_encode($subs, JSON_FORCE_OBJECT);

        // $teacher_data_array = array(
        //     'subjects' => $subs,
        //     'lates' => 10,
        //     'max' => 10,
        // );

        // return $teacher_data_array;

        // return $teacherClasses;

        // return $lates;

        // return $lates_arr;
        return $subs;
    }

    public function teacherClasses($month)
    {
        
        $classes = auth()->user()
        ->teacherClass()
        ->with(['schoolClass', 'attendances' => function($query) use ($month){
            $query->whereMonth('date', $month);
        }])
        ->get();

        $subject_name_array = [];
        $lates_array = [];
        $absents_array = [];

        if( !empty($classes) ){
            foreach( $classes as $class )
            {
                $attendances = $class->attendances;

                $time_start = new Carbon($class->schoolClass->time);
                $subjects = $class->schoolClass->name;

                array_push($subject_name_array, $subjects);
                $attendance_arr = array();

                $late = 0;
                $absent = 0;

                foreach($attendances as $attendance)
                {
                    $unformatted_time_in = new Carbon($attendance->time_in);
                    $time_in = $unformatted_time_in->toTimeString();
                    $time_diff_in_minutes = $time_start->diffInMinutes($time_in);
                    $time_diff_in_hours = $time_start->diffInHours($time_in);

                    

                    if($time_diff_in_hours < 1)
                    {
                        if($time_diff_in_minutes > 5 AND $time_diff_in_minutes <= 15)
                        {
                            $late++;
                        }
                        elseif($time_diff_in_minutes > 15)
                        {
                            $absent++;
                        }
                    }else{
                        $absent++;
                    }
                }
                array_push($lates_array, $late);
                array_push($absents_array, $absent);
            }
        }
        
        $performance = array(
            'subjects' => $subject_name_array,
            'lates' => $lates_array,
            'absents' => $absents_array,
            'max' => 10,
        );
        return $performance;
    }
}
