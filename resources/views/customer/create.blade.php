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
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d944.4083933819285!2d98.99818192917493!3d18.769897499204028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTjCsDQ2JzExLjYiTiA5OMKwNTknNTUuNCJF!5e0!3m2!1sth!2sth!4v1608883468294!5m2!1sth!2sth" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
@endsection
