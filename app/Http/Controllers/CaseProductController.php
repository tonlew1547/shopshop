<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CaseProduct;
use App\Product;
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
        $case_product->amount = $request->amount;;
        $case_product->customer_id = $request->customer_id;
        $case_product->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Case_product  $case_product
     * @return \Illuminate\Http\Response
     */
    public function edit(CaseProduct $case_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Case_product  $case_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaseProduct $id)
    {
        $case_product = CaseProduct::find($id);
        $case_product->name = $request->name;
        $case_product->time = $request->time;
        $case_product->amount = $request->amount;
        $case_product->customer_id = $request->customer_id;
        $case_product->save();

        return redirect()->route('case_product.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Case_product  $case_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaseProduct $id)
    {
        $case_product = CaseProduct::find($id);
        $case_product->delete();
        return back();
    }
}
