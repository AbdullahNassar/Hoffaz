<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    protected $fillable = ['student_id'  ,'material_id','center_id','date'];

    public function details(){
        return $this->hasMany(StudentPercent::class ,'grade_id');
    }
}
