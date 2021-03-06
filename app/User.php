<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'contact', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Classes::class, 'teacher_class', 'user_id', 'classes_id');
    }

    public function teacherClass()
    {
        return $this->hasMany(TeacherClass::class, 'user_id');
    }

    public static function exists($tch_num) {
        $u = User::where('tch_num', $tch_num);
        return $u->exists();
    }

}
