<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    protected $fillable = ['course_id' ,'material_id'];

    public function material(){
        return $this->belongsTo(Material::class ,'material_id');
    }

    public function course(){
        return $this->belongsTo(Course::class ,'course_id');
    }
}
