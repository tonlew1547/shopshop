<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายละเอียดของแถม</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

@extends('layouts.argon_template')
@section('content')
<html>

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">เพิ่มรายละเอียดที่แถมสินค้า</h3>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0" style="min-height: 50vh">
                <form action="{{url('case_product_update/'.$case_product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$case_product->id}}">
                    <div class="row">
                        <div class="col-15 col-sm-4">
                            <div class="form-group">
                                <body>
                                    <p>วันที่แถม
                                    <input id="datepicker" name="time"  width="276" value="{{$case_product->time}}" />
                                    <script>
                                        $('#datepicker').datepicker({
                                            uiLibrary: 'bootstrap4'
                                        });
                                    </script>
                             </p>
                            </div>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('customer', 'ลูกค้า'); !!}
                                <select class="form-control" name="customer_id" id="customer_id" disabled>

                                @forelse ($customer as $item)
                                @php
                                    $edit_case = $case_product->customer_id == $item->id ? 'selected' : '';
                                @endphp
                                        <option value="{{ $item->id }}" {{$edit_case}}>{{ $item->name }}</option>
                                @empty

                                @endforelse
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <P>เลือกของแถมสินค้าได้มากกว่า 1 รายการ </p>
                                        <th>เลือก</th>
                                        <th>สินค้า</th>
                                        <th>จำนวน</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($product as $item)
                                    @php
                                    $edit_product = $detail_product[$item->id]->product_id == $item->id ? 'checked' : '';
                                    @endphp
                                    <tr>
                                        <td scope="row"><input type="checkbox" class="form-check-input" name="product_id[]" id="product_id" value="{{$item->id}}" {{$edit_product}}>
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td><input type="number" class="form-control" name="amount[]" id="amount" value="{{$detail_product[$item->id]->amount}}"></td>
                                    </tr>
                                    @empty

                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>





                    <div class="row mt-2 col-2">
                        <div class="col">
                            {!! Form::submit('บันทึก', ['class' => 'btn btn-primary']) !!}



                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
