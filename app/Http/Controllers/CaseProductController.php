<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CaseProduct;
use App\Product;
use App\DetailProduct;
use Illuminate\Http\Request;

class CaseProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Product::find($id)->decrement('qty',1);
        $case_product = CaseProduct::paginate(10);
        return view('case_product.index')->with('case_product', $case_product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $case_product = CaseProduct::all()->pluck('name', 'id');
        $data['customer'] = Customer::all();
        $data['product'] = Product::all();
        return view('case_product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $case_product = new CaseProduct();
        $case_product->time = $request->time;
        $case_product->amount = isset($request->product_id) ? count($request->product_id) : 0;
        $case_product->customer_id = $request->customer_id;
        $case_product->save();

        // dd($request->all());


        if (isset($request->product_id) && count($request->product_id) > 0) {
            foreach ($request->product_id as $key => $value) {
                $product = Product::find($value);
                $detail = new DetailProduct();
                $detail->cost = $product->cost;
                $detail->amount = $request->amount[$key];
                $detail->case_product_id  = $case_product->id;
                $detail->product_id  = $value;
                $detail->save();
                $product->decrement('quantity', $request->amount[$key]);
            }
        } else {
            # code...
        }

        return redirect()->route('case_product.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Case_product  $case_product
     * @return \Illuminate\Http\Response
     */
    public function show(CaseProduct $case_product)
    {

        return view('detail_product.index')->with('case_product', $case_product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Case_product  $case_product
     * @return \Illuminate\Http\Response
     */
    public function edit(CaseProduct $case_product)
    {
        $data['customer'] = Customer::all();
        $data['product'] = Product::all();
        $data['case_product'] = $case_product;
        $data['detail_product'] = DetailProduct::where('case_product_id', $case_product->id)->get()->keyBy('product_id');
        // dd($data);
        return view('case_product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Case_product  $case_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaseProduct $case_product)
    {

        $case_product->time = $request->time;
        $case_product->amount = isset($request->product_id) ? count($request->product_id) : 0;
        $case_product->customer_id = $request->customer_id;
        $case_product->save();

        // dd($request->all());

        DetailProduct::where('case_product_id', $case_product->id)->delete();
        if (isset($request->product_id) && count($request->product_id) > 0) {
            foreach ($request->product_id as $key => $value) {
                $product = Product::find($value);
                $detail = new DetailProduct();
                $detail->cost = $product->cost;
                $detail->amount = $request->amount[$key];
                $detail->case_product_id  = $case_product->id;
                $detail->product_id  = $value;
                $detail->save();
                $product->decrement('quantity', $request->amount[$key]);
            }
        } else {
            # code...
        }

        return redirect()->route('case_product.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Case_product  $case_product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $case_product = CaseProduct::find($id);
        $case_product->delete();
        // $detail_product = DetailProduct::find($id);
        // $detail_product->delete();

        return back();
    }
}
