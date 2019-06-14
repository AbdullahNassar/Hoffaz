<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    protected $fillable = ['student_id' ,'course_id' ,'center_id' ,'date','status'];

    public function student(){
        return $this->belongsTo(Student::class ,'course_id');
    }
}
