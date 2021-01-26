<?php

namespace App\Http\Controllers;


use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $products = Product::all();
        $products = Product::paginate(5);
        return view('product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productTypes = ProductType::all()->pluck('name', 'id');
        return view('product.create')->with('productTypes', $productTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $product = new Product();
        $product->name = $request->name;
        $product->cost = $request->cost;
        // $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->product_types_id = $request->product_types_id;
        // dd($request->all());
        // exit();
        // $product->save();
        if ($request->image) {
            // $filename = 'product-' . $product->id . '.' . $request->file('image')->getClientOriginalExtension();
            // $request->file('image')->move(public_path() . '/images/products/', $filename);
            // $product->image = $filename;
            $product->image = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('images'), $product->image);
        } else {
            $product->image = 'no-image.jpg';
        }
        // echo $product->image;
        // exit();
        $product->save();

        return redirect()->route('products.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
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
        $product = Product::find($id);
        $productTypes = ProductType::all()->pluck('name', 'id');
        return view('product.edit')
            ->with('product', $product)
            ->with('productTypes', $productTypes);
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
        $product =  Product::find($id);
        $product->name = $request->name;
        $product->cost = $request->cost;
        // $product->price = $request->price; 
        $product->quantity = $request->quantity;
        $product->product_types_id = $request->product_types_id;
        // dd($request->hasFile('image'));
        // exit();
        // $product->save();
        if ($request->hasFile('image')) {
            // $filename = 'product-' . $product->id . '.' . $request->file('image')->getClientOriginalExtension();
            // $request->file('image')->move(public_path() . '/images/products/', $filename);
            // $product->image = $filename;
            $product->image = time() . '.' . $request->file('image')->extension();
            $request->image->move(public_path('images'), $product->image);
        } else {
            $product->image = $product->image;
        }
        // echo $product->image;
        // exit();
        $product->save();

        return redirect()->route('products.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $products = Product::find($id);
        unlink(public_path('images/' . $products->image));
        $products->delete();
        return back();
    }


    // แจ้งเตือนไลน์

    public function line()
    {

        $token = "RVOhWjIQBIfFrMtydp4uyh8FKsk2qpiBE42WCaFGTij"; //ใส่Token ที่copy เอาไว้

        $products = Product::where("line_notify", "Y")->get();
        if (count($products) > 0) {

            $str = "วันที่ " . date('d/m/Y');
            foreach ($products as $key => $value) {
                $str .= "\n  - {$value->name} : {$value->quantity}";
            }


            $queryData = array('message' => $str);
            $queryData = http_build_query($queryData, '', '&');
            $headerOptions = array(
                'http' => array(
                    'method' => 'POST',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                        . "Authorization: Bearer " . $token . "\r\n"
                        . "Content-Length: " . strlen($queryData) . "\r\n",
                    'content' => $queryData
                ),
            );
            $context = stream_context_create($headerOptions);
            $result = file_get_contents("https://notify-api.line.me/api/notify", FALSE, $context);
            $res = json_decode($result);
        }


        return redirect('products');
    }

    function notifyCheck(Product $product)
    {
        $product->line_notify = ($product->line_notify == "Y" ? "N" : "Y");
        $product->save();
        return redirect('products');
    }
}
