<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status','user_id','total_amount',];
    //
    public function orderDetails(){
        return $this->hasMany(orderDetails::class); // hear we define relation [this category hasMany products ]
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id'); // hear we define relation [this product belongsTo category]
    }
}
