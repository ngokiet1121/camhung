@extends('frontend.master')
@section('content')
<div class="content">
	<div class="title-featured">
			<h3>{{ $name }}</h3>
		<div class="list-item-category">

		<?php 
		if($parent == 0){
			$menusm = DB::table('product_menu')->where('parent',$id)->get();
		}else{
			$menusm = DB::table('product_menu')->where('parent',$parent)->get();
		}
		?>
			<ul>
			@foreach($menusm as $sm)
				<li><a href="{{ route('product',$sm->slug) }}"><?php echo $sm->name; ?></a></li>
			@endforeach
			</ul>
		</div>
	</div>
	<div class="featured-product">
		<?php 
			$pro_menub = DB::table('product_menu')->where('id',$id)->first();	
		?>
		@if ($pro_menub->parent == 0)
			<?php 
				$pro_menusm = DB::table('product_menu')->where('parent',$id)->get(); 
				
			?>
			@if (count($pro_menusm) != 0)
			@foreach ($pro_menusm as $pro_menusm_item)
				<?php 
					$pro_items = DB::table('products')->where('product_menu_id',$pro_menusm_item->id)->paginate(12);
				?>
				@foreach($pro_items as $val)
				@if (count($val) > 0)
					
				
					@if ($val->quantity > 0)
						<div class="product ">
							<div class="img-product mask shine text-center">
							<?php $arr = explode('|', $val->img); ?>
								<a href="{{ route('product.item',$val->slug) }}"><img src="{{ asset('uploads/images') }}/<?php echo $arr[0]; ?>" alt=""></a>
							</div>
							<div class="price-product">
								<h3><?php echo $val->name; ?></h3>
								<h4><?php echo number_format($val->price); ?> VNĐ</h4>
							</div>
						</div>
					@endif
				@else
				<div class="product">
					<div class="title-cart">
						<h2>Không có sản phẩm nào</h2>
					</div>
				</div>	
				@endif
				@endforeach
			@endforeach
			
			@endif
		@else
			<?php 
				$pro_items = DB::table('products')->where('product_menu_id',$id)->paginate(12);
			?>
			@if (count($pro_items) != 0)
				{{-- expr --}}
			
			@foreach ($pro_items as $val)
				
					@if ($val->quantity > 0)
						<div class="product ">
							<div class="img-product mask shine text-center">
							<?php $arr = explode('|', $val->img); ?>
								<a href="{{ route('product.item',$val->slug) }}"><img src="{{ asset('uploads/images') }}/<?php echo $arr[0]; ?>" alt=""></a>
							</div>
							<div class="price-product">
								<h3><?php echo $val->name; ?></h3>
								<h4><?php echo number_format($val->price); ?> VNĐ</h4>
							</div>
						</div>
					@endif

			@endforeach
			@else
				<div class="product">
					<div class="title-cart">
						<h2>Không có sản phẩm nào</h2>
					</div>
				</div>
			@endif
		@endif
	</div>

	@if ($pro_items->currentPage() > 1)
	<div class="see-more">
		<ul class="pagination">
        	@if($pro_items->currentPage() != 1)
            	<li><a href="{!!  !!}">Trước</a></li>
			@endif
            @for($i = 1;$i <= $pro_items->lastPage() ; $i++)
            	<li class="active" >
            		<a  href="{!! str_replace('/?','?',$pro_items->url($i)) !!}">{!! $i !!}</a>
            	</li>
            @endfor
			@if($pro_items->currentPage() != $pro_items->lastPage())
            	<li><a href="{!! str_replace('/?','?',$pro_items->url($pro_items->currentPage() + 1)) !!}">Sau</a></li>
            @endif
        </ul>
	</div>
	@endif

</div>
@endsection()