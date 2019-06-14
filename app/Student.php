<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['image','student_name','birth','age','gender','national_id','address','email','first_day' ,'level_id' ,'center_id','guardian_id','nationality','transportation'];
    
    public function details(){
        return $this->hasMany(StudentMaterial::class ,'student_id');
    }

    public function courses(){
        return $this->hasMany(StudentCourse::class ,'student_id');
    }

    public function absent(){
        return $this->hasMany(Absent::class ,'student_id');
    }
}
