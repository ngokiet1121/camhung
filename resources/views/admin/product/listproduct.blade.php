
@extends('admin.master')
<!--outter-wp-->
@section('content')
<?php
	$admin = Auth::guard('admin')->user();
?>
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
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">Sản phẩm</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h3 class="inner-tittle two">Danh sách sản phẩm</h3>
		<h4>
			<a href="{!! URL::route('admin.product.getAddproduct')!!}" type="button" class="btn btn-default">
				<i class="fa fa-plus" aria-hidden="true"></i> Thêm mới sản phẩm</a>
			</h4>
			<div class="graph">
				<div class="data-table">
					<table id="list-table" class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Tên sản phẩm</th>
								<th>Đơn giá</th>
								<th>Giảm giá</th>
								<th>Nổi bật</th>
								<th>Ngày nhập kho</th>
								<th></th>
							</tr>
						</thead>					
						<tbody>
							<?php $stt = 0;?>
							@foreach($product as $item)
							<?php $stt = $stt + 1;?>
							<tr>
								<td>{!! $stt !!}</td>
								<td>{!! $item['name'] !!}</td>
								<td>{!! $item['price'] !!} </td>
								<td>{!! $item['sale'] !!}%</td>
								<td>
								@if ($item['hot'] == 1)
									Nỗi bật
								@else
									Không nỗi bật
								@endif
								
								</td>
								<td>{!! $item['created_at'] !!} </td>                      
								<td>
								@if($admin['role_id'] == 1 || $admin['id'] == $item['admin_id'])
									<a href="{!! URL::route('admin.product.getEditproduct',$item['id']) !!}" title="Sửa"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></a>
									<a title="Xóa" data-toggle="modal" data-target="#{!! $item['id'] !!}" href="#"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
								@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table> 
				</div>
				@foreach($product as $item)
				<div id="{!! $item['id'] !!}" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<span class="modal-title">Xóa dữ liệu</span>
							</div>
							<div class="modal-body">
								<p>Bạn có chắc muốn xóa dự liệu này?</p>
							</div>
							<div class="modal-footer">
							<a href="{!! URL::route('admin.product.getDeleteproduct',$item['id']) !!}" type="button" class="btn btn-default">Đồng ý</a>
								<button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<!--//graph-visual-->
	</div>
	@endsection()