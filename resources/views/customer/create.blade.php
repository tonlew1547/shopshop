@extends('layouts.argon_template')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">เพิ่มข้อมูลลูกค้า</h3>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0" style="min-height: 50vh">
                <!-- {!! Form::open(['url' => route('customers.store') ,'file'=>true,'enctype'=>"multipart/form-data"]) !!} -->
                <form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                {!! Form::label('name', 'ชื่อ-สกุล'); !!}
                                {!! Form::text('name', null, ['class' => 'form-control']); !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('tel', 'เบอร์โทรศัพท์'); !!}
                                {!! Form::text('tel', null, ['class' => 'form-control']); !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
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
