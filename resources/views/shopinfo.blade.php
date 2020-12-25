@extends('layouts.argon_template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ข้อมูลร้าน</div>


    <div class="crad-body">
        <ul>
        <li>เจ้าของร้าน : {{$name}}</li>
        <li>โทรศัพท์ : {{$phone}}</li>
        <li>ที่อยู่ : {{$address}}</li>
        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d944.4083933819285!2d98.99818192917493!3d18.769897499204028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTjCsDQ2JzExLjYiTiA5OMKwNTknNTUuNCJF!5e0!3m2!1sth!2sth!4v1608883468294!5m2!1sth!2sth" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

@endsection
