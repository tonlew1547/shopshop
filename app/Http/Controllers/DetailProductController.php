<?php

namespace App\Http\Controllers;

use App\Detailproduct;
use App\Customer;
use App\CaseProduct;
use App\Product;

use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_product = Detailproduct::paginate(10);
        return view('detail_product.index')->with('detail_product', $detail_product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['customer'] = Customer::all();
        // $data['product'] = Product::all();
        // return view('detail_product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detail_product = new Detailproduct();
        $detail_product->detail_time = $request->time;
        $detail_product->detail_amount = isset($request->case_products_id) ? count($request->case_products_id) : 0;
        $detail_product->case_products_id = $request->case_products_id;
        $detail_product->save();

        if (isset($request->product_id) && count($request->case_products_id) > 0) {
            foreach ($request->case_products_id as $key => $value) {
            }
        } else {
            # code...
        }

        return redirect()->route('detail_product.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail_product  $detail_product
     * @return \Illuminate\Http\Response
     */
    public function show(Detailproduct $detail_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail_product  $detail_product
     * @return \Illuminate\Http\Response
     */
    public function edit(Detailproduct $detail_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail_product  $detail_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detailproduct $id)
    {
        $detail_product = Detailproduct::find($id);
        $detail_product->name = $request->name;
        $detail_product->time = $request->time;
        $detail_product->amount = $request->amount;
        $detail_product->customer_id = $request->customer_id;
        $detail_product->save();

        return redirect()->route('detail_product.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail_product  $detail_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detailproduct $detail_product)
    {
        //
    }
}
