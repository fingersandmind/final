<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct(){

        $this->middleware('guest', ['except' => 'destroy']);
    }


    public function create(){
        
        return view('sessions.create');

    }

    public function store(){
        
        if(! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors('Email or Password not found or unmatched');
        }
       // session()->flash('Welcome Back', 'I see');
        return redirect('home')->with('status', 'Welcome back'. ' '. auth()->user()->name );

    }

    public function destroy(){

        auth()->logout();

        return view('welcome');
    }
    
}
