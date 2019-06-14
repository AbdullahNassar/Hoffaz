<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\language;

class Type extends Model
{
    protected $fillable = ['name'];

    public function doc(){
        return $this->hasMany(Doc::class ,'type_id');
    }
}
