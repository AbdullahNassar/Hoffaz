<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $fillable = ['file','type_id'];

    public function type(){
        return $this->belongsTo(Type::class ,'type_id');
    }

}
