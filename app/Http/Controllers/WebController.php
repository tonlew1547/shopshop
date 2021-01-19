<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    public function shopinfo()
    {
        $name = "TRAKOOL";
        $phone = "0999199699";
        $address = "273/8 ถ.ช้างคลาน ต.ช้างคลาน อ.เมือง จ.เชียงใหม่ 50100";
        return view('shopinfo',[
            'name' => $name,
            'phone' => $phone,
            'address' => $address
        ]);

    }

    public function showmap()
    {
        return view('showMap');
    }
}
