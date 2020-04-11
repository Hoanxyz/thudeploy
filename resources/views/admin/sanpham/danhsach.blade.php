@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Danh sách</small>
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
                                <th>Tên</th>
                                <th>Loại sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Giá</th>
                                <th>Giá khuyến mãi</th>
                                <th>Ảnh</th>
                                <th>Đơn vị</th>
                                <th>Hàng mới</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sanpham as $sp)
                            @if($sp->status == 0)
                            <tr class="even gradeC" align="center">
                                <td>{{$sp->id}}</td>
                                <td>{{$sp->name}}</td>
                                <td>
                                    @foreach($loaisp as $l)
                                        @if($sp->id_type == $l->id)
                                        {{$l->name}}
                                        @endif                                    
                                    @endforeach             
                                </td>
                                <td>{{$sp->description}}</td>
                                <td>Còn hàng</td>
                                <td>{{$sp->unit_price}}</td>
                                <td>{{$sp->promotion_price}}</td>
                                <td><img src="source/image/product/{{$sp->image}}" style="height: 90px; width: 100px"></td>
                                <td>{{$sp->unit}}</td>
                                <td>
                                    @if($sp->new == 0)
                                    {{'Không'}}
                                    @else
                                    {{'Có'}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$sp->id}}" onclick="return confirm('Bạn có muốn xóa không?');"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$sp->id}}">Sửa</a></td>
                            </tr>
                            @endif
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
    $('.alert').delay(5000).slideUp('slow');
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