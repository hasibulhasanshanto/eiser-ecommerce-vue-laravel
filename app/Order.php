<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class, 'id');
    }
}