<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['material_name' ,'success','price' ,'p1','p2','p3','p4','p5' ,'level_id'];

    public function details(){
        return $this->hasMany(CourseMaterial::class ,'material_id');
    }

    public function teachers(){
        return $this->hasMany(TeacherMaterial::class ,'material_id');
    }
}
