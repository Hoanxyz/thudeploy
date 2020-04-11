@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách khách mua hàng
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
                                <th>Tên</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Phone</th>
                                <th>Ghi chú</th>
                                <th>Delete</th>
                                <!-- <th>Edit</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($khach as $k)
                            <tr class="odd gradeX" align="center">
                                <td>{{$k->id}}</td>
                                <td>{{$k->name}}</td>
                                <td>{{$k->gender}}</td>
                                <td>{{$k->email}}</td>
                                <td>{{$k->address}}</td>
                                <td>{{$k->phone_number}}</td>
                                <td>{{$k->note}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoadon/xoakhach/{{$k->id}}" onclick="return confirm('Bạn có muốn xóa không?')"> Xóa</a></td>
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