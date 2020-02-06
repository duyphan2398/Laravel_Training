<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Subject extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_add'];

    public function student(){
        return $this->belongsToMany('App\Student','students_subjects');
    }
    public function teacher(){
        return $this->belongsTo('App\Teacher','id_teacher','id');
    }
    protected $fillable = [
        'name',
        'credit',
        'id_teacher',
        'deleted_at'
    ];
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
}
