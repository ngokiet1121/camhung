@extends('frontend.master')
@section('content')
<div class="content">
	<div class="title-featured">
		<h3>Sản phẩm tìm được</h3>
	</div>
		<div class="featured-product">
		@if(count($pros) != 0)
		@foreach($pros as $pro)
		<div class="product ">
			<div class="img-product mask shine text-center">
				<?php $arr = explode('|', $pro->img); ?> 
				<a href="{{ route('product.item',$pro->slug) }}"><img src="{{ asset('uploads/images') }}/{{ $arr[0] }}" alt="{{ $pro->img_note }}"></a>
			</div>
			<div class="price-product">
				<h3>{{ $pro->name }}</h3>
				<h4>{{ number_format($pro->price) }} VNĐ</h4>
			</div>
		</div>
		@endforeach
		@else
		<div class="title-cart">
			<h2>Không có sản phẩm nào</h2>
		</div>
		@endif
	</div>
</div>
@endsection()