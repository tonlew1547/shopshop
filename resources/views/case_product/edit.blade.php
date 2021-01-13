<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แก้ไขรายละเอียดลูกค้า</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

@extends('layouts.argon_template')
 @section('content')
 <div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">แก้ไขข้อมูลลูกค้า {{$case_product->name}}</h3>
                    </div>
                </div>
            </div>
        <div class="card-body pt-0" style="min-height: 50vh">
        {!! Form::model($case_product, ['url' => route('case_product.update',$case_product->id),'method' => 'put','enctype'=>"multipart/form-data"])!!}

        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <body>
                        <p>วันที่แถม
                        <input id="datepicker" name="time"  width="276" />
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap4'
                            });
                        </script>
                 </p>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
            {!! Form::label('customer_id', 'ชื่อลูกค้า'); !!}
            {!! Form::select('customer_id', $Customers,null,['class' => 'form-control']); !!}
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
                <tr>
                    <td scope="row"><input type="checkbox" class="form-check-input" name="product_id[]" id="product_id" value="{{$item->id}}">
                    </td>
                    <td>{{$item->name}}</td>
                    <td><input type="number" class="form-control" name="amount[]" id="amount"></td>
                </tr>
                @empty

                @endforelse

            </tbody>
        </table>
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
