<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classes;

class College extends Model
{
    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
}
