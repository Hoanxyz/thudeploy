@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
                            <small>{{$loai->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/loaisp/sua/{{$loai->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên loại sản phẩm</label>
                                <input class="form-control" name="name" placeholder="Nhập tên loại sản phẩm" value="{{$loai->name}}" />
                            </div>
                            
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" name="description" placeholder="Nhập tên loại sản phẩm" value="{{$loai->description}}" />
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                    <p>
                                        <img width="250px" height="200px" src="source/image/type_product/{{$loai->image}}">
                                    </p>
                                <input type="file" class="form-control" name="image" />
                            </div>

                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
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