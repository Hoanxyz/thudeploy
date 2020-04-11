@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Thông tin chi tiết</span>
				</div>
			</div>
			<div class="col-lg-12" style="margin-top: 50px">
                    @if(session('thongbao'))
                            <div class="alert alert-success" >
                                {{session('thongbao')}}
                            </div>
                    @endif
				</div>

			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container" style="margin-top: 100px">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">

						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p style="font-size: 20px" class="single-item-title">Giá sản phẩm:</p>
								<p class="single-item-price">
									@if($sanpham->promotion_price == 0)
										<span>{{number_format($sanpham->unit_price)}} vnđ</span>
									@else
										<span class="flash-del">{{number_format($sanpham->unit_price)}} vnđ</span>
										<span class="flash-sale">{{number_format($sanpham->promotion_price)}} vnđ</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="space20">&nbsp;</div>

							<p style="font-size: 18px">Số lượng:</p>
							<div class="single-item-options">
								<select class="wc-select" name="size">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>

						<div class="panel" id="tab-description">
							{{$sanpham->description}}
						</div>
					</div>

					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
							@foreach($sp_tuongtu as $sptt)
							@if($sptt->status != 2)
							<div class="col-sm-4">
								<div style="margin: 10px" class="single-item">
									@if($sptt->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif

									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sptt->id)}}"><img width="250px" height="200px" src="source/image/product/{{$sptt->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p style="font-size: 20px class="single-item-price">
											@if($sptt->promotion_price == 0)
												<span class="flash-sale">{{number_format($sptt->unit_price)}}vnd</span>
												@else
												<span class="flash-del">{{number_format($sptt->unit_price)}}vnd</span>
												<span class="flash-sale">{{number_format($sptt->promotion_price)}}vnd</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="#">CHi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endif
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="new">{{$sp_tuongtu->links()}}</div>
						<!-- phân trang -->

				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_moi as $moi)
								@if($moi->status != 2)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$moi->id)}}"><img src="source/image/product/{{$moi->image}}" alt=""></a>
									<div class="media-body">
										<p>{{$moi->name}}</p>
										<span style="10px" class="beta-sales-price">
											@if($moi->promotion_price == 0)
												<span>{{number_format($moi->unit_price)}} vnđ</span>
												@else
												<span>{{number_format($moi->promotion_price)}} vnđ</span>
												@endif
										</span>
									</div>
								</div>
								@endif
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
<!-- 					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> --> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection

@section('script')
<script type="text/javascript">
    $('.alert').delay(5000).slideUp('slow');
</script>

@endsection