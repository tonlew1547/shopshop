@extends('layouts.argon_template')
@section('content')
@if(session('status'))
            <div class="row">
                <div class="col">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-inner - icon"><i class="fa fa-check"></i></span>
                                <span class="alert-inner - text"><strong>ทำรายการสำเร็จ!</strong> {{session('status')}}</span>
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
                    <h3 class="mb-0">ข้อมูลประเภทสินค้า{{{count($product_types)}}} รายการ</h3>
                    <div class="col text-right">
                    <a href="{{route('product_types.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มข้อมูลของแถม</a>
            </div>
                 </div>
                     <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ประเภทสินค้า</th>
                            <th scope="col" style="width: 10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product_types as $item)
                                <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <form class="delete" action="{{route('product_types.destroy',$item->id)}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                     <!--   <a href="{{route('product_types.edit',$item->id)}}" class="btn btn-sm btn-outline-success"> <i class="fa fa-edit"></i> แก้ไข</a> -->
                                        <button type="submit" class="btn btn-sm btn-outline-danger"> <i class="fa fa-trash"></i> ลบ</button>
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
                        {{ $product_types->links() }}
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
                @endsection
                @section('script')
                    <script>
                        $(".delete").on("submit", function(){
                            return confirm("คุณต้องการลบข้อมูลใช่หรือไม่ ?");
                        });
                    </script>
                @endsection