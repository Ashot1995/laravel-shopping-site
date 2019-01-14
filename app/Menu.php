<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable=["name",'orders',"url","category_id","parent_id","active"];

}