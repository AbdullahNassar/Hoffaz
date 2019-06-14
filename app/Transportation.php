<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $fillable = ['sat' ,'sun' ,'mon','tue','wed','thu','fri','arrival','launch','price','bus','manager_id','center_id'];
}
