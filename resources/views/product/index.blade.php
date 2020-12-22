@extends('layouts.argon_template')
@section('content')
@if(session('status'))
            <div class="row">
                <div class="col">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-inner - icon"><i class="fa fa-check"></i></span>
                                <span class="alert-inner - text"><strong>Success!</strong> {{session('status')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                     </button>
                    </div>
                </div>
            </div>
 @endif
    <div class="row">
        <div class="col">
            <div class="card shadow">
            <div class="card-header border-0">
 <div class="row align-items-center">
 <div class="col">
 <h3 class="mb-0">ข้อมูลสินค้า ({{count($products)}} รายการ)</h3>
 </div>
 <div class="col text-right">
 <a href="{{route('products.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a>
    </div>
        </div>
            </div>
                <div class="card-header border-0">
                </div>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">ประเภท</th>
                            <th scope="col">ราคาทุน</th>
                        <!--   <th scope="col">ราคาขาย</th> -->
                            <th scope="col">จำนวนคงเหลือ</th>
                            <th scope="col">รูป</th>
                            <th scope="col" style="width: 10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                        <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->productType->name}}</td>
                                <td>{{$item->cost}}</td>
                                <td>{{$item->quantity}}</td>
                                <td><img src="{{ asset('images/'.$item->image) }}" height="100" width="100"></td>
                                 <td>
                                    <form class="delete" action="{{route('products.destroy',$item->id)}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <a href="{{route('products.edit',$item->id)}}" class="btn btn-sm btn-outline-success"> <i class="fa fa-edit"></i> แก้ไข</a>
                                        <button type="submit" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')" class="btn btn-sm btn-outline-danger"> <i class="fa fa-trash"></i> ลบ</button>
                                        {{-- <button type="submit" class="btn btn-sm btn-outline-danger"> <i class="fa fa-trash"></i> ลบ</button> --}}
                                    </form>
                        </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <div class="row">
                    <div class="col"></div>
                    <div class="col-autp">
                        {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

<script scr="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>
<script scr="https:////cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('.table').DataTable();
} );
</script>


    <script>
        $(".delete").on("submit", function(){
            return confirm("คุณต้องการลบข้อมูลใช่หรือไม่ ?");
        });
    </script>
@endsection

@section('style')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
@endsection
