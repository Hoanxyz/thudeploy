@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa đơn
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
                                <th>ID khách</th>
                                <th>Giá</th>
                                <th>Ngày mua</th>
                                <th>Trạng thái</th>
                                <th>Nhân viên giao hàng</th>
                                <th>Cách thanh toán</th>
                                <th>Ghi chú</th>
                                <th>Chi tiết</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bill as $b)
                            <tr class="odd gradeX" align="center">
                                <td>{{$b->id}}</td>
                                <td>
                                    @foreach($customer as $c)
                                        @if($b->id_customer == $c->id)
                                        {{$c->name}}
                                        @endif                                    
                                    @endforeach
                                </td>
                                <td>{{$b->total}}</td>
                                <td>{{$b->date_order}}</td>
                                <td>
                                    @if($b->status == 0)
                                    {{"Chưa giao"}}
                                    @elseif($b->status == 1)
                                    {{"Đang giao"}}
                                    @else
                                    {{"Đã giao"}}
                                    @endif
                                </td>
                                <td>
                                    @foreach($user as $u)
                                        {{$u->full_name}}
                                    @endforeach
                                </td>
                                <td>{{$b->payment}}</td>
                                <td>{{$b->note}}</td>
                                <td><a href="admin/hoadon/chitiethoadon/{{$b->id}}">Xem</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoadon/xoa/{{$b->id}}" onclick="return confirm('Bạn có muốn xóa không?')"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/hoadon/sua/{{$b->id}}">Sửa</a></td>
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