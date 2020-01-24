<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function subject(){
        return $this->belongsToMany('App\Subject','students_subjects');
    }
    public function teacher(){
        return $this->hasManyThrough('App\Teacher','App\Subject');
    }
}
