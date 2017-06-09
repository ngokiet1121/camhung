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
<div class="content back-pay ">
	<div class="title-cart">
		<h2>THANH TOÁN</h2>
	</div>
	<div class="pay-order">
		<div class="pay-order-left">
			<div class="inf-customer">
				<h3>THÔNG TIN KHÁCH HÀNG</h3>
				<form action="{{ route('checkout') }}" method="POST" class="form-customer">
					{{ csrf_field() }}
					<div class="short-input fix-right" >
						<input type="text" name="name" placeholder="Họ Và Tên Của Bạn" value="{{ old('name') }}">
					</div>
					<div class="short-input">
						<input type="text" name="phone" placeholder="Số Điện Thoại" value="{{ old('phone') }}">
					</div>
					<div class="long-input">
						<input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
					</div>
					<div class="text-note">
						<p>Nhập Địa Chỉ Nhận Hàng</p>
					</div>
					<div class="short-input fix-right">
						<input type="text" name="city" placeholder="Thành Phố" value="{{ old('city') }}">
					</div>
					<div class="short-input">
						<input type="text" name='district' placeholder="Quận/Huyện" value="{{ old('district') }}">
					</div>
					<div class="long-input">
						<input type="text" name="address" placeholder="Số Nhà, Tên Đường, Phường/Xã" value="{{ old('address') }}">
					</div>
					<div class="text-note">
						<p>Yêu Cầu Khác</p>
					</div>
					<div class="long-input">
						<input type="text" name="content"  placeholder="Yêu Cầu Khác ( Không Bắt Buộc )" value="{{ old('content') }}">
					</div>
					<div class="buy-button">
						<input type="submit" value="Gủi" />
					</div>
					@if(count($errors)>0)
						<div style="color: #a94442; background-color: #f2dede; border-color: #ebccd1;">
							<ul style="margin-top: 10px; padding-top: 10px; padding-bottom: 10px;">
								@foreach($errors->all() as $error)
								<li><strong>LỖI! </strong>{!! $error !!}</li>
								@endforeach
							</ul>
						</div>
						@endif
				</form>
			</div>
		</div>
		<div class="pay-order-right">
			<div class="inf-customer">
				<h3>TÓM TẮT ĐƠN HÀNG</h3>
				<form action="#">
					<table class="order-table">
						<thead>
							<tr>
								<th>Tên Sản Phẩm</th>
								<th>Số Lượng</th>
								<th>Giá</th>
							</tr>
						</thead>
						<tbody>
							@if(Session::has('cart'))
							@foreach($products as $product)
							<tr class="item-cart">
								<td><p>{{ $product['item']['name'] }}</p></td>
								<td><p>{{ $product['quantity'] }}</p></td>
								<td>{{ $product['price'] }}</td>
							</tr>
							@endforeach
							<tr class="item-cart2">
								<td colspan="3">
									<h3>Tổng Cộng : {{ $totalPrice }} VNĐ</h3>
								</td>
							</tr>
							@else
							@endif
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection()