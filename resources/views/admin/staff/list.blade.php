@extends('admin.master')
@section('content')
<?php
	$admin = Auth::guard('admin')->user();
?>
<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">Nhân Viên</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h3 class="inner-tittle two">Danh sách Nhân Viên</h3>
		<h4>
			<a href="{!! URL::route('admin.staff.getAddStaff')!!}" type="button" class="btn btn-default">
				<i class="fa fa-plus" aria-hidden="true"></i> Thêm nhân viên</a>
			</h4>
			<div class="graph">
				<div class="data-table">
					<table id="list-table" class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Tên</th>
								<th>Email</th>
								<th>Điện thoại</th>
								<th>Địa chỉ</th>
								<th></th>
							</tr>
						</thead>					
						<tbody>
							<?php $stt = -1;?>
							@foreach($staffs as $item)
							<?php $stt = $stt + 1;?>
							@if($item['role_id'] > 1)
							<tr>
								<td>{!! $stt !!}</td>
								<td>{!! $item['name'] !!}</td>
								<td>{!! $item['email'] !!} </td>
								<td>{!! $item['phone'] !!} </td>
								<td>{!! $item['address'] !!} </td>
								@if($admin['role_id'] == 1)
								<td>
									<a title="Xóa" data-toggle="modal" data-target="#{!! $item['id'] !!}" href="#"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
								</td>
								@endif
							</tr>
							@endif
							@endforeach
						</tbody>
					</table> 
				</div>
				@foreach($staffs as $item)
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
							<a href="{!! URL::route('admin.staff.getDeleteStaff',$item['id']) !!}" type="button" class="btn btn-default">Đồng ý</a>
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