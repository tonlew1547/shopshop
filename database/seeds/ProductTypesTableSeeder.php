<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product_types = DB::table('product_types')->insert([
            ['name'=>'เม้าส์'], //1
            ['name'=>'แผ่นรองเม้าส์'],//2
            ['name'=>'หูฟัง'],//3
            ['name'=>'แฟลชไดรฟ์'], //4
            ['name'=>'แผ่นโปรแกรมสำเร็จ'], //5
            ['name'=>'ชุดทำความสะอาด'], //6
            ['name'=>'Gift voucher'], //7
        ]);
        
    }
}
