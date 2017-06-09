@extends('frontend.master')
@section('content')
<div class="content">
	@foreach($product_item_one as $var)
	<div class="name-product">
		<h2>{{ $var->name }}</h2>
	</div>
	<div class="header-detail-product">
		<div class="img-detail-product">
			<div class="w3-content" style="max-width:1200px">
				<?php $arr = explode('|', $var->img ); ?>
				@if (count($arr) == 1)
					<img class="mySlides big-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[0]; ?>" alt="{{ $var->img_note }}" >
					<div class="w3-row-padding w3-section" style="margin-top: 20px">
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[0]; ?>" alt="{{ $var->img_note }}" onclick="currentDiv(1)">
						</div>
					</div>
				@elseif(count($arr) == 2)
					<img class="mySlides big-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[0]; ?>" alt="{{ $var->img_note }}" >
					<img class="mySlides big-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[1]; ?>" alt="{{ $var->img_note }}" >
					<div class="w3-row-padding w3-section" style="margin-top: 20px">
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[0]; ?>" alt="{{ $var->img_note }}" onclick="currentDiv(1)">
						</div>
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[1]; ?>" alt="{{ $var->img_note }}" onclick="currentDiv(2)">
						</div>
					</div>
				@else
					<img class="mySlides big-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[0]; ?>" alt="{{ $var->img_note }}" >
					<img class="mySlides big-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[1]; ?>" alt="{{ $var->img_note }}" >
					<img class="mySlides big-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[2]; ?>" alt="{{ $var->img_note }}" >
					<div class="w3-row-padding w3-section" style="margin-top: 20px">
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[0]; ?>" alt="{{ $var->img_note }}" onclick="currentDiv(1)">
						</div>
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[1]; ?>" alt="{{ $var->img_note }}" onclick="currentDiv(2)">
						</div>
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="{{ asset('uploads/images') }}/<?php echo $arr[2]; ?>" alt="{{ $var->img_note }}" onclick="currentDiv(3)">
						</div>
					</div>
				@endif
				
			</div>
		</div>
		<div class="right-detail">
			<h3>Mã Sản Phẩm : P0{{ $var->id }}</h3>
			<h3>Giá : {{ number_format($var->price - $var->price*$var->sale/100) }} VNĐ</h3>
			<h3>Số Lượng  : {{ $var->quantity }}</h3>
			<i class="fa fa-thumbs-up" aria-hidden="true"></i><i>Giao Hàng Toàn Quốc Miễn Phí</i> <br>
			<i class="fa fa-thumbs-up" aria-hidden="true"></i><i>Nhận Được Ưu Đãi Khi Mua Nhiều Mặt Hàng</i>
			@if ($var->quantity > 0)
				<a href="{{ route('product.addToCart',$var->id) }}" id="" class="btn-addcart fa fa-shopping-basket"> THÊM VÀO GIỎ HÀNG</a>
			@endif
			
			
		</div>
		<div class="contact-buy">
			<h3>Bạn Có Thắc Mắc ?</h3>
			<h5>Hãy Liên Hệ Với Chúng Tôi Tại Đây</h5>
			@foreach ($information as $info)
			<i class="fa fa-phone" aria-hidden="true"> : {{ $info['phone'] }}</i>
			<i class="fa fa-google-plus" aria-hidden="true"> : {{ $info['email'] }}</i>
			@endforeach
		</div>
	</div>
	<div class="content-detail-product tabs_hover">
		<ul>
			<li><a href="#tab-1">Mô Tả Sản Phẩm</a></li>
		</ul>
		<div id="tab-1">
			<p>{!! $var->description !!}</p>
		</div>
	</div>
</div>

<div class="link-product">
	<a href="#"><h4>Sản Phẩm Cùng Loại </h4></a>
</div>
<div class="sale-product">
	<?php 
		$others = DB::table('products')->where('product_menu_id',$var->product_menu_id)->paginate(3);
	?>
	@foreach ($others as $other)
		@if ($other->id != $var->id && $other->quantity > 0)
			{{-- expr --}}
		
		<div class="view view-first">
		<?php $arr = explode('|', $other->img); ?>
		<img src="{{ asset('uploads/images') }}/<?php echo $arr[0]; ?>" alt="<?php echo $other->name; ?>" />
		<a href="{{ route('product.item',$other->slug) }}">
			<div class="mask2">
				<h2>Chi Tiết Sản Phẩm</h2>
				<p><?php echo strip_tags($other->description); ?></p>
				<a href="{{ route('product.addToCart',$other->id) }}" class="info">Thêm Vào Giỏ Hàng</a>
			</div>
		</a>
		<div class="price-product-sale">
			<h3><?php echo $other->name; ?></h3>
			<span>Giá : <?php echo number_format($other->price); ?> VNĐ</span>
			@if ($other->sale > 0)
                                <h4>Giá : <?php echo number_format($other->price); ?> VNĐ</h4>
				<span>Sale : <?php echo number_format($other->price - $other->price*$other->sale/100) ; ?> VNĐ</span>
			@endif
		</div>
	</div>
	@endif
	@endforeach
</div>
@endforeach()
@endsection()