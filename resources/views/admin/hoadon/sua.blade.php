@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa
                            <!-- <small>Edit</small> -->
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        
                        <form action="admin/hoadon/sua/{{$bill->id}}" method="POST">
                            @csrf
<!--                             <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control">
                                    <option value="0">Please Choose Category</option>
                                    <option value="">Tin Tức</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>Category Order</label>
                                <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" />
                            </div>
                            <div class="form-group">
                                <label>Category Keywords</label>
                                <input class="form-control" name="txtOrder" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Category Status</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Invisible
                                </label>                               
                            </div> -->
                            <div class="form-group">
                                <label>Trạng thái</label><br>
                                <label class="radio-inline">
                                    <input name="status" value="0" 
                                    @if($bill->status == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Chưa giao

                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="1" 
                                    @if($bill->status == 1)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Đang giao
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="2" 
                                    @if($bill->status == 2)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Đã giao
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Nhân viên giao hàng</label>
                                <select class="form-control" name="full_name">
                                    @foreach($user as $u)
                                    <option 


                                     value="{{$u->id}}">{{$u->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection