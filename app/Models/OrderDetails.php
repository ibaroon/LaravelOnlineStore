<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //

    protected $fillable = ['order_id','product_id','price','qty'];
    

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id'); // hear we define relation [this product belongsTo category]
    }

    public function product(){
        return $this->belongsTo(product::class,'product_id','id'); // hear we define relation [this product belongsTo category]
    }
}


