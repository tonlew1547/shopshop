<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    //

    public function case_product()
    {
        return $this->beLongsTo('App\CaseProduct', 'case_products_id', 'id');
    }
}
