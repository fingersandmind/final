<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes;
use Spatie\Permission\Models\Permission;
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
        $data = Classes::orderBy('id','DESC')->paginate(5);
        $class = Classes::all();
        $user = auth()->user();
        return view('class.index',compact('data', 'user', 'class'))
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
        return view('class.create');
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
            'time' => 'required'
        ]);


        // $input = $request->all();

        // $class = Classes::create($input);
        $class = new Classes;
        $class->name = $request->input('name');
        $class->description = $request->input('description');
        $class->day = $request->input('day');
        $class->room = $request->input('room');
        $class->time = $request->input('time');
        $class->save();
        
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
        $class = Classes::find($id);

        return view('class.edit', compact('class'));
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
            'day' => 'required'
        ]);
        $class = Classes::find($id);
        $class->name = $request->input('name');
        $class->description = $request->input('description');
        $class->day = $request->input('day');
        $class->room = $request->input('room');
        $class->time = $request->input('time');
        $class->save();

        return redirect()->route('class.index')
        ->with('success','Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classes::find($id)->delete();
        return redirect()->route('class.index')
                        ->with('success','Class deleted successfully');
    }
}
