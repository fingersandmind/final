<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\College;

class Classes extends Model
{
    protected $fillable = [
        'name', 'description', 'day', 'schedule', 'time_start', 'room', 'clg_no'
    ];

    protected $table = 'classes';

    

    public function users(){
        
        return $this->belongsToMany(User::class, 'teacher_class', 'classes_id', 'user_id');

    }

    public function teacherClass()
    {
        return $this->hasMany(TeacherClass::class, 'classes_id');
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'clg_no');
    }

    public static function exists($course) {
        $class = Classes::where(['name'=>$course]);
        return $class->exists();
    }

    
}
