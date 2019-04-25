<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TeacherClass;

class Semester extends Model
{
    

    public function classes()
    {
        return $this->hasMany(TeacherClass::class, 'semester');
    }


}
