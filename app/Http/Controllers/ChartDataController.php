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
        $month_name_array = array();
        $month_array = array();

        $attendance = Attendance::get()->pluck('date');
        $monthsx = auth()->user()->teacherClass()
        ->with('attendances')
        ->get();

        if( !empty($monthsx) )
        {
            foreach($monthsx as $month)
            {
                $attendance = $month->attendances;

                if( !empty($attendance) ){
                    foreach($attendance as $getDate)
                    {
                        $date = new Carbon($getDate->date);
                        $month_no = $date->format('m');
                        $month_name = $date->format('F');
                        $month_array[$month_no] = $month_name;
                    }
                }
            }
        }
        $months = array(
            'months' => $month_array,
        );

        return $months;
    }

    function getAllSubject()
    {

        $subjects = auth()->user()->subjects()->pluck('name'); 

        return $subjects;

    }


    public function loadChart()
    {
        
        return $this->teacherClasses(10);

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
        $presents_array = [];

        if( !empty($classes) ){
            foreach( $classes as $class )
            {
                $attendances = $class->attendances;

                $time_start = new Carbon($class->schoolClass->time_start);
                $subjects = $class->schoolClass->name;

                array_push($subject_name_array, $subjects);
                $attendance_arr = array();

                $present = 0;
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
                        if($time_diff_in_minutes < 5)
                        {
                            $present++;
                            
                        }
                        elseif($time_diff_in_minutes > 5 AND $time_diff_in_minutes <= 15)
                        {
                            $late++;
                            
                        } else {
                            $absent++;
                        }
                    }else{
                        $absent++;
                    }
                }
                array_push($lates_array, $late);
                array_push($absents_array, $absent);
                array_push($presents_array, $present);
            }
        }
        
        $performance = array(
            'subjects' => $subject_name_array,
            'lates' => $lates_array,
            'absents' => $absents_array,
            'presents' => $presents_array,
            'max' => 20,
        );
        return $performance;
    }
}
