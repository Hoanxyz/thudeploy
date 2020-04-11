@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$loai_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Sản phẩm</span>
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
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai as $l)
							<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $sp)
								@if($sp->status != 2)
								<div class="col-sm-4">
									<div style="margin:10px " class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp->id)}}" target="blank"><img height="220px" src="source/image/product/{{$sp->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											@if($sp->promotion_price != 0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											@if($sp->status == 1)
												<div class="ribbon-wrapper"><div class="ribbon sale" style="color: black"><b>Hết</b></div></div>
											@endif
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price" style="font-size: 18px">
												@if($sp->promotion_price == 0)
												<span>{{number_format($sp->unit_price)}} vnđ</span>
												@else
												<span class="flash-del">{{number_format($sp->unit_price)}} vnđ</span>
												<span class="flash-sale">{{number_format($sp->promotion_price)}} vnđ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endif
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $spk)
								@if($spk->status != 2)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$spk->id)}}" target="blank"><img height="220px" src="source/image/product/{{$spk->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											@if($spk->promotion_price != 0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<p class="single-item-title">{{$spk->name}}</p>
											<p class="single-item-price" style="font-size: 18px">
												@if($spk->promotion_price == 0)
												<span>{{number_format($spk->unit_price)}} vnđ</span>
												@else
												<span class="flash-del">{{number_format($spk->unit_price)}} vnđ</span>
												<span class="flash-sale">{{number_format($spk->promotion_price)}} vnđ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$spk->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$spk->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endif
								@endforeach
							</div>

							<div class="row">{{$sp_khac->links()}}</div>
						<!-- phân trang -->

							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection

@section('script')
<script type="text/javascript">
    $('.alert').delay(5000).slideUp('slow');
</script>

@endsection