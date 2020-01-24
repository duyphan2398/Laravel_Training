<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    public function subject(){
        return $this->hasMany('App\Subject','id_teacher','id');
    }

}
