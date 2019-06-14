<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['teacher_name','username','password','recover','birth','address','email' ,'phone' ,'job','qualifications','image','salary','first_day','hours'];
    
    public function details(){
        return $this->hasMany(TeacherMaterial::class ,'teacher_id');
    }
}
