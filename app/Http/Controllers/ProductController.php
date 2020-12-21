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
        //
        $products = Product::find($id);
        $products->delete();
        return back();
    }
}