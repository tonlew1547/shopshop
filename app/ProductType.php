<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $table = 'product_types';
    protected $primarykey = 'id';
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
