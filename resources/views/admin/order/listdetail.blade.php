@extends('admin.master')
<!--outter-wp-->
@section('content')

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">OrderDetail</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h3 class="inner-tittle two">Danh sách chi tiết đơn hàng</h3>
                <h4><a href="{!! URL::route('admin.order.getList')!!}" type="button" class="btn btn-default">
					<i class="fa fa-list-alt" aria-hidden="true"></i> Danh sách đơn hàng</a>
				</h4>
		<div class="graph">
			<div class="data-table">
				<table id="list-table" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Giảm giá</th>
							<th>Giá</th>
							<th>Mã hóa đơn</th>
							<th></th>
						</tr>
					</thead>					
					<tbody>
						<?php $stt = 0;?>
						@foreach($orderdetail as $item)
						<?php $stt = $stt + 1;?>
						<tr>
							<td>{!! $stt !!}</td>
							<td>{!! $item['name'] !!}</td>
							<td>{!! $item['quantity'] !!} </td>
							<td>{!! $item['sale'] !!}</td>
							<td>{!! $item['price'] !!} </td>
							<td>
								{!! $item['order_id'] !!}
							</td>
							<td>
								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table> 
			</div>
		</div>
	</div>
	<!--//graph-visual-->
</div>
<!--//outer-wp-->
@endsection()