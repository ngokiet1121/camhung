<div class="nav-menu-scroll">
	<div class="list-menu-scroll">
		<ul>
			
			@foreach($product_menu as $item)
			@if($item['parent'] == 0)
			<li class="parent-scroll"><a href="{{ route('product',$item['slug']) }}">{{ $item['name'] }}</a>
				<?php 
				$product_menu2 = DB::table('product_menu')->where('parent','=', $item['id'])->get();
				?>
				<ul>
					@foreach($product_menu2 as $item2)
					<li><a href="{{ route('product',$item2->slug) }}" > <?php print_r($item2->name); ?></a></li>
					@endforeach
				</ul>
			</li>
			@endif
			@endforeach

			<li><a href="#">Liên Hệ</a></li>
		</ul>
		<!-- nút giỏ hàng -->
		<div class="click-cart right-menu-sroll">
			<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
		</div>
		<!-- kêt thúc nút giỏ hàng -->
	</div>
</div>