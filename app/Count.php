<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    protected $fillable = ['student_id' ,'amount','paid','remain' ,'date','notes'];
}