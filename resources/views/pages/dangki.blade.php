@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<!-- <h6 class="inner-title">Đăng kí</h6> -->
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng ký</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('signin')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
							{{$err}}
							@endforeach
						</div>
					@endif
					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
               		@endif
				</div>
					<div class="col-sm-6">
						<h4>Đăng ký</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Họ và tên*</label>
							<input type="text" id="your_last_name" name="fullname" required>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" name="address" required>
						</div>


						<div class="form-block">
							<label for="phone">Số điện thoại*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu*</label>
							<input type="password" id="phone" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu*</label>
							<input type="password" id="phone" name="re_password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection