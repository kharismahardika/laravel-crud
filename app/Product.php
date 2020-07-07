<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name','price','stock'];


    public function category()
    {
        return $this->belongsTo('App/Category');
    }
}
