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
            <div class="col">
                <div class="form-group">
                {!! Form::label('name', 'ชื่อสินค้าของแถม'); !!}
                {!! Form::text('name', null, ['class' => 'form-control']); !!}
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