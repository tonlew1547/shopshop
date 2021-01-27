@extends('layouts.argon_template')

 @section('content')
 <div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">เพิ่มข้อมูลสินค้า</h3>
                    </div>
                </div>
            </div>
        <div class="card-body pt-0" style="min-height: 50vh">
        <!-- {!! Form::open(['url' => route('products.store') ,'file'=>true,'enctype'=>"multipart/form-data"]) !!} -->
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">ชื่อสินค้า</label>
                    <input class="form-control" name="name" type="text" id="name"required>
                </div>
            </div>

                <div class="col">
                    <div class="form-group">
                        {!! Form::label('product_types_id', 'ประเภทชื่อสินค้า'); !!}
                        {!! Form::select('product_types_id', $productTypes,null,
                        ['class' => 'form-control']); !!}
                </div>
            </div>
        </div>
           <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="cost">ราคาทุน</label>
                        <input class="form-control" name="cost" type="text" id="cost"required>
                    </div>
                </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="quantity">จำนวนคงเหลือ</label>
                                <input class="form-control" name="quantity" type="text" id="quantity"required>
                            </div>
                        </div>

        </div>
                <div class="row">
                    <div class="form-group">
                        <label for="image">รูปภาพ</label>
                        <input name="image" type="file" id="image">
                    </div>
                </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input class="btn btn-primary" type="submit" value="บันทึก">
                            <a href="{{url('products')}}" class="btn btn-primary" role="button">ย้อนกลับ</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                   </div>
                </div>
            </div>
    </div>
 @endsection
