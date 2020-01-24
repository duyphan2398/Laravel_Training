<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function student(){
        return $this->belongsToMany('App\Student','students_subjects');
    }
    public function teacher(){
        return $this->belongsTo('App\Teacher','id_teacher','id');
    }
}
