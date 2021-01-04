@extends('layouts.argon_template')
 
 @section('content')
 <div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">แก้ไขข้อมูลลูกค้า {{$customer->name}}</h3>
                    </div>
                </div>
            </div>
        <div class="card-body pt-0" style="min-height: 50vh">
        {!! Form::model($case_product, ['url' => route('case_product.update',$case_product->id),'method' => 'put','enctype'=>"multipart/form-data"])!!}
        <div class="row">
            <div class="col">
                <div class="form-group">
                {!! Form::label('name', 'ชื่อ-สกุล'); !!}
                {!! Form::text('name', null, ['class' => 'form-control']); !!}
                </div>
            </div>
            
                {{-- <div class="col">
                    <div class="form-group">
                    {!! Form::label('product_types_id', 'ประเภทชื่อสินค้า'); !!}
                    {!! Form::select('product_types_id', $productTypes,null,['class' => 'form-control']); !!}
                </div>
            </div> --}}
        </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('tel', 'เบอร์โทรศัพท์'); !!}
                        {!! Form::text('tel', null, ['class' => 'form-control']); !!}
                    </div>
                </div>
          <div class="col">
                        <div class="form-group">
                            {!! Form::label('address', 'ที่อยู่'); !!}
                            {!! Form::text('address', null, ['class' => 'form-control']); !!}
                        </div>
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