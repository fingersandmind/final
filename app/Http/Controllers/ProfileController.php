<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use Hash;

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
            ->with('status','You have successfully upload image.');
 
    }

    public function updateProfile(Request $request){
        // dd($request->all());
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$request->user_id,
        'username' => 'required|unique:users,username,'.$request->user_id,
        'password' => 'same:confirm-password'
    ]);
        
        $user = User::findOrFail($request->user_id);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        

        $user->update($input);
        return back()
            ->with('status', 'You have successfully updated your profile');
    }
}
