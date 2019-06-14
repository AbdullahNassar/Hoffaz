<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherMaterial extends Model
{
    protected $fillable = ['teacher_id' ,'material_id'];

    public function material(){
        return $this->belongsTo(Material::class ,'material_id');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class ,'teacher_id');
    }
}
