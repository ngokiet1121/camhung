@extends('frontend.master')
@section('content')
<div class="content">
	<!-- Phần fix cứng -->
	<div class="title-featured">
		<h3>Sản Phẩm Mới Nhất</h3>
	</div>
	<!-- kết thúc Phần fix cứng -->
	<!-- phần sản phẩm mua nhiều. load những sản phẩm nào order nhiều nhất ra -->
	<div class="featured-product">
		@if(count($pros) != 0)
		@foreach($pros as $pro)
		@if($pro['quantity'] > 0)
		<div class="product ">
			<div class="img-product mask shine text-center">
				<?php $arr = explode('|', $pro['img']); ?> 
				<a href="{{ route('product.item',$pro['slug']) }}"><img src="{{ asset('uploads/images') }}/{{ $arr[0] }}" alt="{{ $pro['img_note'] }}"></a>
			</div>
			<div class="price-product">
				<h3>{{ $pro['name'] }}</h3>
				<h4>{{ number_format($pro['price']) }} VNĐ</h4>
			</div>
		</div>
		@endif
		@endforeach
		@else
		<h3>Không có sản phẩm nào</h3>
		@endif
	</div>
	<!-- Click vào xem thêm sẽ load qua trang khác listproduct.  -->
	<?php 
		$pros_hot = DB::table('products')->where('hot','=',1)->get();
	?>

	@if(count($pros_hot) >= 8)
	<div class="see-more">
		<a href="{{ route('product.hot') }}">Xem Thêm</a>
	</div>
	@endif
	<!-- kết thúc phần sản phẩm mua nhiều. load những sản phẩm nào order nhiều nhất ra -->

	<div class="title-featured">
		<h3>Giảm Giá - Ưu Đãi</h3>

	</div>
	<div class="sale-product">
		@if(count($pros2) != 0)
			@foreach($pros2 as $pro2)
				<div class="view view-first">
				<?php $arr = explode('|', $pro2['img']); ?> 
					<img src="{{ asset('uploads/images') }}/{{ $arr[0] }}" alt="{{ $pro2['img_note'] }}">
					<a href="{{ route('product.item',$pro2['slug']) }}">
						<div class="mask2">
							<h2>Chi Tiết Sản Phẩm</h2>
							<p>{{ $pro2['content'] }}</p>
							<a href="{{ route('product.addToCart',$pro2['id']) }}" class="info">Thêm Vào Giỏ Hàng</a>
						</div>
					</a>
					<div class="price-product-sale">
						<h3>{{ $pro2['name'] }}</h3>
						<h4>Giá : {{ number_format($pro2['price']) }} VNĐ</h4>
						<span>Sale : {{ number_format($pro2['price'] - $pro2['price']*$pro2['sale']/100) }} VNĐ</span>
					</div>
				</div>
			@endforeach
		@else
		<h3>Không có sản phẩm nào</h3>
		@endif
	</div>
	<?php 
		$pros_sale = DB::table('products')->where('sale','<>',0)->get();
	?>
	@if(count($pros_sale) >= 6)
	<div class="see-more">
		<a href="{{ route('product.sale') }}">Xem Thêm</a>
	</div>
	@endif
</div>
@endsection()