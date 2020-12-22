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

@endsection
