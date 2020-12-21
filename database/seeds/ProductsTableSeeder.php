<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = DB::table('products')->insert([
        ['name'=>'น้ำดื่มสิงห์ 1500 ml.','product_types_id'=>2,'cost'=>10,'price'=>14,'quantity'=>100],
        ['name'=>'น้ำดื่มเนสเล่ 600 ml.','product_types_id'=>2,'cost'=>5,'price'=>10,'quantity'=>50],
        ['name'=>'โค้กไม่มีน้ำตาล 330 ml.','product_types_id'=>2,'cost'=>7,'price'=>10,'quantity'=>50],
        ['name'=>'ป๊อกกี้ รสสตรอเบอร์รี่','product_types_id'=>3,'cost'=>15,'price'=>18,'quantity'=>50],
        ['name'=>'ยูโร่ คัสตาร์ด','product_types_id'=>3,'cost'=>2,'price'=>5,'quantity'=>50],
    ]);
    
    
        
    }
}
