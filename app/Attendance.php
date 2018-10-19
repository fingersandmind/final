<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TeacherClass;
use App\User;

class Attendance extends Model
{
    protected $dates = ['date'];

    public function attendances()
    {
        return $this->hasOne(TeacherClass::class, 'id', 'teacher_class_id');
    }
}
