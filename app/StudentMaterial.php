<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentMaterial extends Model
{
    protected $fillable = ['student_id' ,'material_id'];

    public function material(){
        return $this->belongsTo(Material::class ,'material_id');
    }

    public function student(){
        return $this->belongsTo(Student::class ,'student_id');
    }
}
