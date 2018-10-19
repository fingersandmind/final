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

    public function store(Request $request){

        // $username = $request->username; //the input field has name='username' in form

        // if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
        //     //user sent their email 
        //     auth()->attempt(['email' => $username, 'password' => $request->password]);
        // } else {
        //     //they sent their username instead 
        //     auth()->attempt(['username' => $username, 'password' =>  $request->passwordd]);
        // }

        // //was any of those correct ?
        // if ( auth()->check() ) {
        //     //send them where they are going 
        //     return redirect()->intended('home')->with('status', 'Welcome back'. ' '. auth()->user()->name );
        // }

        // return redirect()->back()->withErrors([
        //     'credentials' => 'Please, check your credentials'
        // ]);

        
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
