<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes;
use Spatie\Permission\Models\Permission;
use App\College;
use App\Semester;
use DB;

class ClassController extends Controller
{

    function __construct()
    {
         $this->middleware('auth');
         $this->middleware('permission:role-edit', ['only' => ['edit','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $sem = Semester::where('active', 1)->firstOrFail();
        $data = $sem->classes()->with('schoolClass')->paginate(5);

        return view('class.index',compact('data', 'user', 'sem'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = auth()->user();
        $colleges = ["Select College"] + College::pluck('name', 'id')->all();
        
        return view('class.create', compact('colleges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'day' => 'required',
            'room' => 'required',
            'time_start' => 'required',
            'schedule' => 'required',
            'clg_no' => 'required'
        ]);


        $input = $request->all();

        $class = Classes::create($input);
        
        return redirect()->route('class.index')
                        ->with('success','Class created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Classes::find($id);

        return view('class.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colleges = ["Select College"] + College::pluck('name', 'id')->all();
        $class = Classes::find($id);

        return view('class.edit', compact('class', 'colleges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'day' => 'required',
            'clg_no' => 'required'
        ]);
        $class = Classes::find($id);
        $input = $request->all();
        
        $class->update($input);


        return redirect()->route('class.index')
        ->with('success','Class updated successfully');
    }

    public function delete(Request $request)
    {

        $class = Classes::find($request->id);
        $class->delete();
        return response()->json(['status' => 'deleted'],200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Classes::find($id)->delete();
    //     return redirect()->route('class.index')
    //                     ->with('success','Class deleted successfully');
    // }



    public function loadClass()
    {
        $tch_no = auth()->user()->tch_num;
        $user = auth()->user();
        
        $url = env('MDC_API_URL') . "teacher_sched/" . $tch_no ."/". env('MDC_SEM_CODE');
        
        $response = json_decode(file_get_contents($url));

        foreach($response as $data) {
            if(!Classes::exists($data->course)) {
                $sched = $data->time_start . " - " . $data->time_end;

                $class = new Classes();
                $class->name = $data->course;
                $class->description = $data->description;
                $class->day = $data->day;
                $class->schedule = $sched;
                $class->room = $data->room;
                $class->clg_no = $data->clg_no;
                $class->time_start = $data->time_start;
                $class->time_end = $data->time_end;

                $class->save();

                $user->subjects()->attach($class->id, ['semester' => env('MDC_SEM_CODE')]);
            }
        }

        return redirect()->back()->with('success','Class updated successfully');
    }
}
