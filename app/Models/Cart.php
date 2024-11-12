<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['product_id','user_id','qty',];

// public function user(){
//     return $this->belongsTo(User::class,'user_id','id'); // hear we define relation 
// }

 public function product(){
     return $this->belongsTo(Product::class,'product_id','id'); // hear we define relation 
 }

}
