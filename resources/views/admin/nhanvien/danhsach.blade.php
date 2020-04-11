@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhân viên
                            <small>Danh sách</small>
                        </h1>
                    </div class="col-lg-12">
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
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th>Phone</th>
                                <th>Địa chỉ</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nhanvien as $nv)
                            <tr class="odd gradeX" align="center">
                                <td>{{$nv->id}}</td>
                                <td>{{$nv->name}}</td>
                                <td>{{$nv->email}}</td>
                                <td>{{$nv->gender}}</td>
                                <td>{{$nv->phone}}</td>
                                <td>{{$nv->address}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nhanvien/xoa/{{$nv->id}}" onclick="return confirm('Bạn có muốn xóa không?');"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nhanvien/sua/{{$nv->id}}">Sửa</a></td>
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