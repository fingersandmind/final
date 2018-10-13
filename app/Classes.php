<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['body'];

    

    public function teacher(){
        
        return $this->belongsToMany(User::class, 'teacher_class')->withTimestamps();

    }
}
