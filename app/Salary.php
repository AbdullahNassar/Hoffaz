<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['teacher_id','salary' ,'days','hours','month','year','bonus','minus','parts','final','status','notes'];
}
