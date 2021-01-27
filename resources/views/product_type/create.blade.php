@extends('layouts.argon_template')

 @section('content')
 <div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">เพิ่มประเภทของแถม</h3>
                    </div>
                </div>
            </div>
        <div class="card-body pt-0" style="min-height: 50vh">
        <!-- {!! Form::open(['url' => route('product_types.store') ,'file'=>true,'enctype'=>"multipart/form-data"]) !!} -->
        <form action="{{route('product_types.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                <label for="name">ชื่อสินค้าของแถม</label>
                <input class="form-control" name="name" type="text" id="name"required>
                </div>
            </div>
        </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input class="btn btn-primary" type="submit" value="บันทึก">
                            <a href="{{url('product_types')}}" class="btn btn-primary" role="button">ย้อนกลับ</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                   </div>
                </div>
            </div>
    </div>
 @endsection
