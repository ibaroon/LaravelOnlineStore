<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; // for spatie translation tool

class Category extends Model
{
    //
    use HasTranslations;// for spatie translation tool
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_showing',
        'is_popular',
        'meta_title',
        'meta_description',
        'meta_keywords',
        
    ];
    public $translatable = ['name','description','meta_title','meta_description']; // put columns to be translated
    
    public function products(){
        return $this->hasMany(Product::class); // hear we define relation [this category hasMany products ]
    }
}
