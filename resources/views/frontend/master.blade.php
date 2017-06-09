<!DOCTYPE html>
<html>
<head>
	@include('frontend.includes.head')
</head>
<body>
	<div id="wrapper" >
		<!-- Phần Header -->
		<header>
			<!-- Phần Top-header -->
				@include('frontend.includes.headertop')
			<!-- kết thúc bot-header -->
			<!-- phần menu -->
				<!-- Phần thanh menu ẩn. Khi lắn chuột sẽ hiện ra -->
				@include('frontend.includes.menuhidden')
				<!-- Kết thúc Phần thanh menu ẩn. Khi lắn chuột sẽ hiện ra -->
			<!-- phần table khi click vào giỏ hàng sẽ hiện ra -->
				@include('frontend.includes.shoppingcartdown')
			<!-- kết thúc phần table khi click vào giỏ hàng sẽ hiện ra -->
		</header>
		<!-- kết thúc header -->
		<!-- phần navigation -->
			@include('frontend.includes.nav')
		<!-- Đóng phần navigation -->
		
		{{-- Phan content --}}
			@yield('content')
		{{-- Ket thuc --}}
		<div class="back-to-top" id="bt-top">
			<a href="#" class="hvr-icon-wobble-vertical"></a>
		</div>
			@include('frontend.includes.footer')
	</div>

	@include('frontend.includes.script')

</body>
</html>