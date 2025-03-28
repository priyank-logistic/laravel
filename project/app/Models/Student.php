<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }

    protected $appends = ['password'];

    public function getPasswordAttribute(){
        $state = explode(' ', strtolower($this->attributes['state']))[0];
        return $this->attributes['email'].'.'.$state;
    }
}