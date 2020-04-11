@extends('admin.layout.index')      
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger" id="he">
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
                        <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select class="form-control" name="ProductType">
                                    @foreach($loaisp as $l)
                                    <option value="{{$l->id}}">{{$l->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="name" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <label class="radio-inline">
                                    <input name="status" value="0" checked="" type="radio">Còn hàng
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="1" type="radio">Hết hàng
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="2" type="radio">Ngưng bán
                                </label>

                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="unit_price" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input class="form-control" name="promotion_price" placeholder="" />
                                <!-- <textarea class="form-control" rows="3"></textarea> -->
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" class="form-control" name="image" />
                            </div>
                            <div class="form-group">
                                <label>Đơn vị</label>
                                <input class="form-control" name="unit" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Sản phẩm mới</label>
                                <label class="radio-inline">
                                    <input name="new" value="0" type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="new" value="1" type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
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