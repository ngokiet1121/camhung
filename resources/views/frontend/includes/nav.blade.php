<nav class="nav-show-hid" >
	<div class="navigation">
		<!-- Phần menu đứng luôn có bên cạnh slide -->
		<div class="nav-menu">
			<h3>Danh Mục</h3>
			<ul>
				@foreach($product_menu as $item)
				@if($item['parent'] == 0)
				<li class="parent"><a href="{{ route('product',$item['slug']) }}" alt="{{ $item['name'] }}" >{{ $item['name'] }}</a>
					<?php 
					$product_menu2 = DB::table('product_menu')->where('parent','=', $item['id'])->get();
					?>
					<ul>
						@foreach($product_menu2 as $item2)
						<li><a href="{{ route('product',$item2->slug) }}"><?php print_r($item2->name); ?></a></li>
						@endforeach
					</ul>
				</li>
				@endif
				@endforeach

				<li><a href="{{ asset('lien-he') }}">Liên Hệ</a></li>
			</ul>
		</div>
		<!-- Phần menu đứng luôn có bên cạnh slide -->

		<div class="right-nav">
			<!-- phần search -->
			<div class="search" >
				<div class="icon-click-menu">
					<i class="fa fa-bars fa-2x change-icon" style="color: #fff;" aria-hidden="true" ></i>
				</div>
				<div class="search-menu">
					<div class="search-input">
						<form action="{{ asset('tim-kiem') }}" method="PORT" >
							<input id="hero-demo" autofocus type="text" name="search" placeholder="Bạn Muốn Mua Gì ... ?">
							<input type="submit" value="Search">
						</form>
					</div>
				</div>

			</div>
			<!-- phần slide -->
			<div class="slide-show">
				<div class="single-item-rtl sliders">
					<?php 
						$images = DB::table('galleries')->where('parent',1)->get();
					?>
					@foreach ($images as $element)
						<div>
							<img src="{{ asset('') }}/<?php echo $element->img; ?>" />
						</div>
					@endforeach
				</div>
			</div>
			<!--ket thuc phần slide -->
		</div>
	</div>
</nav>
<div class="contact-ship">
	<div class=" contact-ship-item  hvr-wobble-bottom">
		<i class="fa fa-truck fa-3x" style="color: #f96332" aria-hidden="true"></i>
		<h3>Miễn Phí Giao Hàng</h3>
		<h5>Cho Hóa Đơn Trên 1.000.000 VNĐ</h5>
	</div>
	<div class="contact-ship-item hvr-wobble-bottom">
		<i class="fa fa-money fa-3x" style="color: #f96332" aria-hidden="true"></i>
		<h3>Đổi Trả Dễ Dàng</h3>
		<h5>100% Hoàn Tiền Trong 7 Ngày</h5>
	</div>
	<div class="contact-ship-item hvr-wobble-bottom">
		<i class="fa fa-phone fa-3x" style="color: #f96332" aria-hidden="true"></i>
		<h3>Hỗ Trợ Trực Tuyến 24/24</h3>
		<h5>Dịch vụ hỗ trợ miễn phí 24/7</h5>
	</div>
</div>

 