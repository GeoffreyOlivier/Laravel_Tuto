<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Courses(){
        return $this->hasMany('App\Course');
    }
}
