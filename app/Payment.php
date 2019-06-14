<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['student_id' ,'amount','remain' ,'month' ,'material_id'];
}
