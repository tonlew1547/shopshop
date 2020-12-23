<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function customers()
    {
        return $this->hasMany('App\customers');
    }
}
