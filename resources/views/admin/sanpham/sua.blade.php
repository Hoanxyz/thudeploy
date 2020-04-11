@extends('admin.layout.index')      
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>{{$sanpham->name}}</small>
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
                        <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select class="form-control" name="ProductType">
                                    @foreach($loaisp as $l)
                                    <option 

                                        @if($sanpham->id_type == $l->id)
                                        {{"selected"}}
                                        @endif

                                     value="{{$l->id}}">{{$l->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="name" placeholder="" value="{{$sanpham->name}}" />
                            </div>
                             <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" name="description" placeholder="Nhập tên loại sản phẩm" value="{{$sanpham->description}}" />
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <label class="radio-inline">
                                    <input name="status" value="0" 
                                    @if($sanpham->status == 0)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Còn hàng
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="1" 
                                     @if($sanpham->status == 1)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Hết hàng
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="2" 
                                     @if($sanpham->status == 2)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Ngưng bán
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="unit_price" placeholder="" value="{{$sanpham->unit_price}}"/>
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input class="form-control" name="promotion_price" placeholder="" value="{{$sanpham->promotion_price}}" />
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                    <p>
                                        <img width="250px" height="200px" src="source/image/product/{{$sanpham->image}}">
                                    </p>
                                <input type="file" class="form-control" name="image" />
                            </div>
                            <div class="form-group">
                                <label>Đơn vị</label>
                                <input class="form-control" name="unit" placeholder="" value="{{$sanpham->unit}}" />
                            </div>
                            <div class="form-group">
                                <label>Sản phẩm mới</label>
                                <label class="radio-inline">
                                    <input name="new" value="0" 
                                    @if($sanpham->new == 0)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="new" value="1" 
                                     @if($sanpham->new == 1)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Có
                                </label>
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