<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    protected $fillable = ['logo','name','address','business_registration' ,'tax_card' ,'phone','fax','email','website'];

}
