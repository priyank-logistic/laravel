<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Student extends Model
{
    //
    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }

    // protected $appends = ['password'];
    public function getPasswordAttribute(){
        $state = explode(' ', strtolower($this->attributes['state']))[0];
        return $this->attributes['email'].'.'.$state;
    }

    public function subscriptionDays($subscription_date,$days){
        return Carbon::parse($subscription_date)->addDays($days);
    }
}