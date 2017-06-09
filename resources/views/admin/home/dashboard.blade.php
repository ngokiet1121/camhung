@extends('admin.master')
@section('content')

<script>
	$(document).ready(function() {
		$('.table').DataTable(
		{
			"aoColumnDefs": [
			{ 
				"bSortable": false, 
				  "aTargets": [ -1 ] // <-- gets last column and turns off sorting
				} 
				]
			});
	} );
</script>
<script>

	function timeago(time){
		var currentDate = new Date();
		var arr_thang = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
		var thang = arr_thang[currentDate.getMonth()];
		var ngay = currentDate.getDate();
		var nam = currentDate.getFullYear();
		var gio = currentDate.getHours();
		var phut = currentDate.getMinutes();
		var giay = currentDate.getSeconds();
		var chuoingay = thang + " " + ngay + ", " + nam + " " + gio+":"+phut+":"+giay+" "+"GMT+0700";
		var ham_time = Date.parse(currentDate) / 1000;
		var diff = ham_time - parseInt(time);
		if (diff == 0){  
			return 'Mới đây';
		}
		var get_intervals_text;
		var get_intervals_value;
		var intervals = {
			0: ['năm',   31556926],  
			31556926: ['tháng', 2628000],  
			2628000: ['tuần',  604800],  
			604800: ['ngày',  86400], 
			86400: ['giờ',   3600],  
			3600: ['phút',  60],  
			60: ['giây',  1] 
		};
		if(diff<60){
			get_intervals_text = intervals[60][0];
			get_intervals_value = intervals[60][1];
		}else if(diff<3600){
			get_intervals_text = intervals[3600][0];
			get_intervals_value = intervals[3600][1];
		}else if(diff<86400){
			get_intervals_text = intervals[86400][0];
			get_intervals_value = intervals[86400][1];
		}else if(diff<604800){
			get_intervals_text = intervals[604800][0];
			get_intervals_value = intervals[604800][1];
		}else if(diff<2628000){
			get_intervals_text = intervals[2628000][0];
			get_intervals_value = intervals[2628000][1];
		}else if(diff<31556926){
			get_intervals_text = intervals[31556926][0];
			get_intervals_value = intervals[31556926][1];
		}else{
			get_intervals_text = intervals[0][0];
			get_intervals_value = intervals[0][1];
		}
		var value = Math.floor(diff/get_intervals_value);
		var ago = value+' '+get_intervals_text + (value > 1 ? '' : '');
		var days = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'];
		var day = days[currentDate.getDay()];
		var new_date = new Date(time * 1000);
		var date = (new_date.getDate()<10) ? '0'+new_date.getDate() : new_date.getDate();
		var year = new_date.getFullYear();
		var month = ((new_date.getMonth()+1)<10) ? '0'+(new_date.getMonth()+1) : new_date.getMonth()+1;
		var gio_ht = new_date.getHours()-3;
		var phut_ht = new_date.getMinutes();
		var giay_ht = new_date.getSeconds();
		var ht_time = gio_ht + ":" + phut_ht + ":" + giay_ht;
		if (ago == '1 ngày'){  
			return 'Hôm qua ' + ht_time;
		}else if (value <= 59 && get_intervals_text == 'giây' && value > 0 ||  get_intervals_text == 'phút' ||  get_intervals_text == 'giờ') {  
			return ago + ' trước';  
		}else{
			return date + '-'+ month+'-'+year+ ' ' + ht_time; 
		}
	}


</script>
<div class="outter-wp">

	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
		</ol>
	</div>

	<div class="graph-visual tables-main">
		<h3 class="inner-tittle two">Thống Kê</h3>
			<div id="tabs" class="tabs">
				<div class="graph">
					<nav>
						<ul>
							<li><a href="#product_total" class="icon-shop"><i class="fa fa-flag"></i> <span>Tổng Sản Phẩm</span></a></li>
							<li><a href="#order_total" class="icon-shop"><i class="fa fa-flag"></i> <span>Tổng Đơn hàng</span></a></li>
							<li><a href="#contact_total" class="icon-shop"><i class="fa fa-flag"></i> <span>Tổng Liên Hệ</span></a></li>
						</ul>
					</nav>
					<div  class="content tab" >
						<section id="product_total">
							<div class="data-table">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Tên Sản Phẩm</th>
											<th>Số Lượng</th>
											<th>Giá</th>
											<th>Ngày Nhập Kho</th>
											
											<th></th>
										</tr>
									</thead>					
									<tbody>
									<?php $stt = 0;?>
										@foreach($products as $item)
									<?php $stt = $stt + 1;?>
										<tr>
											<td>{!! $stt !!}</td>
											<td>{!! $item['name'] !!}</td>
											<td>{!! $item['quantity'] !!}</td>
											<td>{!! $item['price'] !!}</td>
											<td>{!! $item['created_at'] !!}</td>
											<td></td>
										</tr>
										@endforeach()
									</tbody>							
								</table> 
							</div>
						</section>
						<section id="order_total">
							<div class="data-table">
								<table  class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Khách hàng</th>
											<th>Email</th>
											<th>Điện thoại</th>
											<th>Địa chỉ</th>
											<th>Ngày đặt</th>
											<th>Trạng thái</th>
											<th></th>
										</tr>
									</thead>					
									<tbody>
									<?php $stt = 0;?>
										@foreach($allOrders as $item)
									<?php $stt = $stt + 1;?>
										<tr>
											<td>{{ $stt }}</td>
											<td>{!! $item['name'] !!}</td>
											<td>{!! $item['email'] !!}</td>
											<td>{!! $item['phone'] !!}</td>
											<td>{!! $item['address'] !!}</td>
											<td>{!! $item['created_at'] !!}</td>
											<td>	
												@if ($item['status'] == 1)
													Đang chờ
												@elseif($item['status'] == 2)
													Đã xác nhận
												@elseif($item['status'] == 3)
													Đã chuyển
												@elseif($item['status'] == 4)
													Đã hũy	
												@endif
											</td>
											<td></td>
										</tr>
										@endforeach()
									</tbody>
								</table> 
							</div>
						</section>
						<section id="contact_total">
							<div class="data-table">
								<table  class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Khách hàng</th>
											<th>Email</th>
											<th>Điện thoại</th>
											<th>Địa chỉ</th>
											<th></th>
										</tr>
									</thead>					
									<tbody>
										<?php $stt = 0;?>
											@foreach($contacts as $item)
										<?php $stt = $stt + 1;?>
										<tr>
											<td>{!! $stt !!}</td>
											<td>{!! $item['name'] !!}</td>
											<td>{!! $item['email'] !!}</td>
											<td>{!! $item['phone'] !!}</td>
											<td>{!! $item['address'] !!}</td>
											<td></td>
										</tr>
										@endforeach()
									</tbody>
								</table> 
							</div>
						</section>
					</div><!-- /content -->
				</div>
				<!-- /tabs -->
			</div>
			<script src="{{ asset('public/admin/js/cbpFWTabs.js')}}"></script>
			<script>
				new CBPFWTabs( document.getElementById( 'tabs' ) );
			</script>
	</div>
</div>
@endsection()