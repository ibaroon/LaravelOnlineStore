<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; // for spatie translation tool

class Product extends Model
{

    use HasTranslations;// for spatie translation tool
    protected $fillable = [
     

            'category_id',
            'name',
            'slug',
            'short_description',
            'description',
            'price',
            'selling_price',
            'image',
            'qty',
            'tax',
            'status',
            'trend',
            'meta_title',
            'meta_description',
            'meta_keywords',   
        
    ];
    public $translatable = ['name','short_description','description','meta_description']; // put columns to be translated

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id'); // hear we define relation [this product belongsTo category]
    }
}
