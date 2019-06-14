<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPercent extends Model
{
    protected $fillable = ['grade' ,'grade_id','material_id','percent_id'];

    public function grade(){
        return $this->belongsTo(StudentGrade::class ,'grade_id');
    }
}
