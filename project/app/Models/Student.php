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

    public function subscriptionDays($days){
        $subscription_date = $this->attributes['subscription_date'];
        // return $subscription_date;
        $newDate = Carbon::parse($subscription_date)->addDays($days);
        // return $newDate;
        $this->attributes['subscription_date'] = $newDate;
        $this->save();
        
    }
}