<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name", 'description',"image", "category_id", "price","type"];

    public function category()
    {
        return $this->belongsTo("App\Category");
    }
    public function cart(){
        return $this->hasMany('App\Cart');
    }
}
