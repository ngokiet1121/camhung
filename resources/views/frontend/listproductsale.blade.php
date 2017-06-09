@extends('frontend.master')
@section('content')
<div class="content">
	<div class="title-featured">
			<h3>Giảm Giá - Ưu Đãi</h3>
		<div class="list-item-category">
		</div>
	</div>
	<div class="featured-product">
	
			@foreach ($pros_sale as $val)
				
				<div class="product ">
					<div class="img-product mask shine text-center">
					<?php $arr = explode('|', $val['img']); ?>
						<a href="{{ route('product.item',$val->slug) }}"><img src="{{ asset('uploads/images') }}/<?php echo $arr[0]; ?>" alt=""></a>
					</div>
					<div class="price-product">
						<h3>{{ $val['name'] }}</h3>
						<h4>{{ number_format($val['price']) }} VNĐ</h4>
					</div>
				</div>

			@endforeach
	</div>

	<div class="see-more">
		<ul class="pagination">
	        	@if($pros_sale->currentPage() != 1)
	            	<li><a href="{!! str_replace('/?','?',$pros_sale->url($pros_sale->currentPage() - 1)) !!}">Prev</a></li>
			@endif
	            @for($i = 1;$i <= $pros_sale->lastPage() ; $i++)
	            	<li class="active" >
	            		<a  href="{!! str_replace('/?','?',$pros_sale->url($i)) !!}">{!! $i !!}</a>
	            	</li>
	            @endfor
			@if($pros_sale->currentPage() != $pros_sale->lastPage())
	            	<li><a href="{!! str_replace('/?','?',$pros_sale->url($pros_sale->currentPage() + 1)) !!}">Next</a></li>
	            @endif
	        </ul>
	</div>

</div>
@endsection()