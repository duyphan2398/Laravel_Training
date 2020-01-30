<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Subject extends Model
{
    public function student(){
        return $this->belongsToMany('App\Student','students_subjects');
    }
    public function teacher(){
        return $this->belongsTo('App\Teacher','id_teacher','id');
    }
    protected $fillable = [
        'name',
        'credit',
        'id_teacher'
    ];
}
