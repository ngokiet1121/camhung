@extends('frontend.master')
@section('content')
<style>
	.nav-show-hid{
		display: none;
	}
	.contact-ship{
		display: none;
	}
</style>
<div class="content back-pay">
	<div class="title-cart">
		<h2>GIỎ HÀNG</h2>
	</div>
	<div class="table-cart">
		<form action="#">
			<table class="shop-table">
				<thead>
					<tr>
						<th>Ảnh Sản Phẩm</th>
						<th >Tên Sản Phẩm</th>
						<th>Giá Sản Phẩm</th>
						<th>Số Lượng</th>
						<th>Tổng Cộng</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@if(Session::has('cart'))
					@foreach($products as $product)
					<tr class="nav-item-cart">
						<?php $arr = explode('|', $product['item']['img']); ?>
						<td><img src="{{ asset('uploads/images') }}/{{ $arr[0] }}" alt=""></td>
						<td><p>{{ $product['item']['name'] }}</p></td>
						<td>{{$product['item']['price'] - $product['item']['price']*$product['sale']/100 }}</td>
						<td>{{ $product['quantity'] }}</td>
						<td>{{ $product['price'] }}</td>
						<td><a href="{{ route('product.subToCart',$product['item']['id']) }}"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
					</tr>
					@endforeach
					<tr class="nav-item-cart">
						<td colspan="3">
							<h3>Tạm Tính : {{ $totalPrice }} VNĐ</h3>
						</td>
						<td colspan="3">
							<a  href="{{ route('checkout') }}" type="button" class="btn-addcart fa fa-credit-card-alt ">   THANH TOÁN</a>
						</td>
					</tr>
					@else
						<tr class="nav-item-cart">
						<td colspan="6">
							<h3>Bạn chưa đặt mặt hàng nào cả</h3>
						</td>
						</tr>
					@endif
				</tbody>
			</table>

		</form>
	</div>
</div>
@endsection()