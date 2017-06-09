@extends('frontend.master')
@section('content')
<div class="content">
	<div class="title-featured">
			<h3>Sản phẩm nổi bật</h3>
		<div class="list-item-category">
		</div>
	</div>
	<div class="featured-product">
			@foreach ($pros_hot as $val)
			@if ($val['quantity'] > 0)				
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
			@endif
			@endforeach
	</div>
	<div class="see-more">
		<ul class="pagination">
	        	@if($pros_hot->currentPage() != 1)
	            	<li><a href="{!! str_replace('/?','?',$pros_hot->url($pros_hot->currentPage() - 1)) !!}">Prev</a></li>
			@endif
	            @for($i = 1;$i <= $pros_hot->lastPage() ; $i++)
	            	<li class="active" >
	            		<a  href="{!! str_replace('/?','?',$pros_hot->url($i)) !!}">{!! $i !!}</a>
	            	</li>
	            @endfor
			@if($pros_hot->currentPage() != $pros_hot->lastPage())
	            	<li><a href="{!! str_replace('/?','?',$pros_hot->url($pros_hot->currentPage() + 1)) !!}">Next</a></li>
	            @endif
	        </ul>
	</div>

</div>
@endsection()