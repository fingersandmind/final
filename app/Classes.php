<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['body'];

    

    public function users(){
        
        return $this->belongsToMany(User::class, 'teacher_class', 'classes_id', 'user_id');

    }

    
}
