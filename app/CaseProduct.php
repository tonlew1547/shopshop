<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseProduct extends Model
{
    //case_products

    public function customer()
    {
        return $this->beLongsTo('App\Customer', 'customer_id', 'id');
    }
    
    public function detail_products()
    {
        return $this->hasMany('App\DetailProduct', 'case_product_id');
    }
}
