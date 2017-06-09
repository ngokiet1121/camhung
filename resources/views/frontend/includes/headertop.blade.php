<div class="header">
	<div class="left-all-header ">
		<div class="left-header">
			<div class="clock">
				<div id="Date"></div>
				<ul>
					<li id="hours"></li>
					<li class="point">:</li>
					<li id="min"></li>
					<li class="point">:</li>
					<li id="sec"></li>
				</ul>
			</div>
		</div>
		
		<div class="right-header" style="float: right;">
			<ul>
				<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="{{ route('product.shoppingCart') }}">Giỏ Hàng
					@if (!Session::has('cart'))
						<span class="badge"></span>
					@else
					<span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span>
					@endif
				</a>

				</li>
			</ul>
		</div>
	</div>					
</div>
<!-- Kết thúc Top-Header -->
<!-- Phần bot-header -->
<div class="bot-header">
	<div class="logo">
		<a href="{{ route('home') }}"><img src="{{ asset('uploads/images') }}/logo3.png" alt="home"></a>
	</div>
	<div class="contact">
		<ul>
		<li><a>Liên hệ chúng tôi</a></li>
			@foreach ($information as $info)
			
			<li><i class="fa fa-phone" style="color: #f96332" aria-hidden="true"></i><a href="#">{{ $info['phone'] }}</a></li>
			<li><i class="fa fa-map-marker" style="color: #f96332" aria-hidden="true"></i><a href="#">{{ $info['address'] }}</a></li>
			@endforeach
		</ul>
	</div>
</div>