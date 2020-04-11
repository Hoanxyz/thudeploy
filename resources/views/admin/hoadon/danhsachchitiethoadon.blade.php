@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách chi tiết hóa đơn
                            <small></small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                    @if(session('thongbao'))
                            <div class="alert alert-success" >
                                {{session('thongbao')}}
                            </div>
                    @endif
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>ID hóa đơn</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Giá 1 sản phẩm</th>
                                <th>Xóa</th>
                                <!-- <th>Edit</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsachchitiet as $dsct)
                            <tr class="odd gradeX" align="center">
                                <td>{{$dsct->id}}</td>
                                <td>{{$dsct->id_bill}}</td>
                                <td>
                                    @foreach($sanpham as $sp)
                                    @if($dsct->id_product == $sp->id)
                                        {{$sp->name}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{$dsct->quantity}}</td>
                                <td>{{$dsct->unit_price}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoadon/xoachitiet/{{$dsct->id}}" onclick="return confirm('Bạn có muốn xóa không?')"> Xóa</a></td>
                                <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection

@section('script')
<script type="text/javascript">
    $('.alert').delay(3000).slideUp('slow');
</script>

@endsection

@section('script')
<script type="text/javascript">

      var result = confirm("Want to delete?");
        if (result) {
            return true;
          else
            return false;
    }
</script>
@endsection