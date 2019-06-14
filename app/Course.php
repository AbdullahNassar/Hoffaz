<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_name' ,'center_id' ,'level_id','max_num','time','price'];

    public function details(){
        return $this->hasMany(CourseMaterial::class ,'course_id');
    }

}
