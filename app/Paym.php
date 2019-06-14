<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paym extends Model
{
    protected $fillable = ['student_id' ,'amount','remain' ,'month','year'];
}
