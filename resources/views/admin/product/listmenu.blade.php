
@extends('admin.master')
<!--outter-wp-->
@section('content')
<?php
	$admin = Auth::guard('admin')->user();
?>
<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">Loại sản phẩm</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h3 class="inner-tittle two">Danh sách loại sản phẩm</h3>
		<h4>
			<a href="{!! URL::route('admin.product.getAddmenu')!!}" type="button" class="btn btn-default">
				<i class="fa fa-plus" aria-hidden="true"></i> Thêm mới loại sản phẩm</a>
			</h4>
			<div class="graph">
				<div class="data-table">
					<table id="list-table" class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Loại sản phẩm</th>
								<th>Hiển thị</th>
								<th>Nổi bật</th>
								<th></th>
							</tr>
						</thead>					
						<tbody>
							<?php $stt = 0;?>
							@foreach($product_menu as $item)
							<?php $stt = $stt + 1;?>
							@if($item['parent'] == 0)
							<tr>
								<td>{!! $stt !!}</td>
								<td>{!! $item['name'] !!}</td>
								<td>{!! $item['is_active'] !!} </td>
								<td>{!! $item['hot'] !!} </td>
								<td>
								@if($admin['role_id'] == 1 || $admin['id'] == $item['admin_id'])
									<a href="{!! URL::route('admin.product.getListmenusm',$item['id']) !!}" title="Danh mục con"><i class="fa fa-dropbox fa-2x" aria-hidden="true"></i></a>
									<a href="{!! URL::route('admin.product.getEditmenu',$item['id']) !!}" title="Sửa"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></a>
									<a title="Xóa" data-toggle="modal" data-target="#{!! $item['id'] !!}" href="#"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
								@endif
								</td>
							</tr>
							@endif
							@endforeach
						</tbody>
					</table> 
				</div>
				@foreach($product_menu as $item)
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
							<a href="{!! URL::route('admin.product.getDeletemenu',$item['id']) !!}" type="button" class="btn btn-default">Đồng ý</a>
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