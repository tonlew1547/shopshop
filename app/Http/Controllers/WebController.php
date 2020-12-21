<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    public function shopinfo()
    {
        $name = "ม่อน";
        $phone = "0000";
        $address = "50/11";
        return view('shopinfo',[
            'name' => $name,
            'phone' => $phone,
            'address' => $address
        ]);

    }
}
