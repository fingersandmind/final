<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class ProfileController extends Controller
{
    public function profile(){
        $user = auth()->user();

        return view('profile', compact('user', $user));
    }

    public function updateAvatar(Request $request){
 
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=25,max_width=500'
        ]);
 
        $user = auth()->user();
        if(File::exists(storage_path('app/public/avatars/'.$user->avatar))){
            File::delete(storage_path('app/public/avatars/'.$user->avatar));
        }
        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();
        return back()
            ->with('success','You have successfully upload image.');
 
    }
}
