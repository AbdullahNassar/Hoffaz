<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['teacher_id','attend','leave','day','day_ar','status'];

}
