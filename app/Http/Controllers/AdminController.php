<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function downloadTeachers() {
        $url = env('MDC_API_URL') . "list_teachers";
        $response = json_decode(file_get_contents($url));
        
        foreach($response as $data) {
            $rand = rand(10,100);
            if(!User::exists($data->tch_num)) {
                $uname = substr($data->lname,0,5) . '_' . substr($data->fname,0,4) . $rand;

                $user = new User();
                $user->name = $data->lname . ", " . $data->fname;
                $user->email = $uname . "@email.com";
                $user->username = $uname;
                $user->tch_num = $data->tch_num;
                $user->password = bcrypt('secret');
                $user->contact = "-";

                $user->save();
            }
        }
        return redirect()->back()->with('success','Teacher loaded successfully');
        // return "<p>download complete.</p>
        // <p><a href='http://localhost/capstonefinal/public/home'>Home</a></p>";
    }
}
