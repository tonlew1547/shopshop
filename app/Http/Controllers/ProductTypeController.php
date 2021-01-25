<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $product_types = ProductType::all();
        $product_types = ProductType::paginate(10);
        return view('product_type.index')->with('product_types', $product_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::all()->pluck('name', 'id');
        return view('product_type.create')->with('productTypes', $productTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_type = new ProductType();
        $product_type->name = $request->name;

        $product_type->save();

        $token = "RVOhWjIQBIfFrMtydp4uyh8FKsk2qpiBE42WCaFGTij"; //ใส่Token ที่copy เอาไว้
        $str = "มีการเพิ่มเประเภทสินค้า => ".$request->name; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
        
        $queryData = array('message' => $str);
        $queryData = http_build_query($queryData,'','&');
        $headerOptions = array( 
                'http'=>array(
                    'method'=>'POST',
                    'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                            ."Authorization: Bearer ".$token."\r\n"
                            ."Content-Length: ".strlen($queryData)."\r\n",
                    'content' => $queryData
                ),
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents("https://notify-api.line.me/api/notify",FALSE,$context);
        $res = json_decode($result);

        return redirect()->route('product_types.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_types = ProductType::find($id);
        // $productTypes = ProductType::all()->pluck('name', 'id');
        return view('product_type.edit')
            ->with('product_type', $product_types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_type = ProductType::find($id);
        $product_type->name = $request->name;
        $product_type->save();

        return redirect()->route('product_types.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_types = ProductType::find($id);
        $product_types->delete();
        return back();
    }
}
