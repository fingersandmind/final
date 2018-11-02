<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Classes;
use App\Semester;

class TeacherClass extends Model
{

    protected $table = 'teacher_class';
    
    // public function user()
    // {
    //     return $this->hasMany(User::class,'id', 'user_id');
    // }

    // public function class()
    // {
    //     return $this->belongsToMany(Classes::class,'id','classes_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function schoolClass()
    {
        return $this->belongsTo(Classes::class, 'classes_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'teacher_class_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
