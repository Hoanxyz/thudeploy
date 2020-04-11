@extends('admin.layout.index')      
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user->full_name}}</small>
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
                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="fullname" value="{{$user->full_name}}" placeholder="Nhập tên" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Nhập email" required readonly="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="changePassword" name="changePassword">
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu" required disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập lại mật khẩu" required disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <label class="radio-inline">
                                    <input name="level" value="0" 
                                    @if($user->level == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Thường

                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="2" 
                                    @if($user->level == 2)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Nhân viên
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="1" 
                                    @if($user->level == 1)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Admin
                                </label>
                                
                            </div>
                            <div class="form-group">
                                <label for="adress">Địa chỉ</label>
                                <input type="text" class="form-control" id="adress" value="{{$user->address}}" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" value="{{$user->phone}}" name="phone" required>
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
    $(document).ready(function(){
        $("#changePassword").change(function(){
            if($(this).is(":checked"))
            {
                $(".password").removeAttr('disabled');
            }
            else
            {
                $(".password").attr('disabled','');
            }
        });
    });
</script>
@endsection

@section('script')
<script type="text/javascript">
    $('.alert').delay(5000).slideUp('slow');
</script>

@endsection