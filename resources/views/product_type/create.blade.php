@extends('layouts.argon_template')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">เพิ่มข้อมูลประเภทสินค้า</h3>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0" style="min-height: 50vh">
                {!! Form::open(['url' => route('products.store') ,'file'=>true]) !!}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('name', 'ชื่อสินค้า'); !!}
                            {!! Form::text('name', null, ['class' => 'form-control']); !!}
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
                            {!! Form::label('cost', 'ราคาทุน'); !!}
                            {!! Form::text('cost', null, ['class' => 'form-control']); !!}
                        </div>
                    </div>
                    <!--  <div class="col">
                        <div class="form-group">
                            {!! Form::label('price', 'ราคาขาย'); !!}
                            {!! Form::text('price', null, ['class' => 'form-control']); !!}
                        </div> 
                    </div> -->
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('quantity', 'จำนวนคงเหลือ'); !!}
                            {!! Form::text('quantity', null, ['class' => 'form-control']); !!}
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('image', 'รูปภาพ'); !!}
                        {!! Form::file('image', null, ['class' => 'form-control-file']); !!}
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        {!! Form::submit('บันทึก', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection