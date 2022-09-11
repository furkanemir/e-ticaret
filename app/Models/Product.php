<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    function getCategory(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }
    public function getImages()
    {
        return $this->hasMany('App\Models\Image', 'product_id');
    }
}
