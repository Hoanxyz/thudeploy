@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm
                            <small>Danh sách</small>
                        </h1>
                    </div >
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
                                <th>Mô tả</th>
                                <th>ẢNh</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loai as $l)
                                <tr class="even gradeC" align="center">
                                    <td>{{$l->id}}</td>
                                    <td>{{$l->name}}</td>
                                    <td>{{$l->description}}</td>
                                    <td><img src="source/image/type_product/{{$l->image}}" style="height: 90px; width: 100px"></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaisp/xoa/{{$l->id}}" onclick="return confirm('Bạn có muốn xóa không?')"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaisp/sua/{{$l->id}}">Sửa</a></td>
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