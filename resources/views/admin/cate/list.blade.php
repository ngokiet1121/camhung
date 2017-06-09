@extends('admin.master')
<!--outter-wp-->
@section('content')
<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">Tin Tức</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h3 class="inner-tittle two">Danh sách tin tức </h3>
		<div class="graph">
			<div class="data-table">
				<table id="list-table" class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>name</th>
							<th>content</th>
							<th></th>
						</tr>
					</thead>					
					<tbody>
						<?php $stt = 0;?>
						@foreach($cates as $item)
						<?php $stt = $stt + 1;?>
						<tr>
							<td>{!! $stt !!}</td>
							<td>{!! $item['name'] !!}</td>
							<td>{!! $item['content'] !!} </td>
							<td>
								<a href="" title="Xem"><i class="fa fa-dropbox fa-2x" aria-hidden="true"></i></a>
								<a href="" title="Sửa"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></a>
								<a title="Xóa" data-toggle="modal" data-target="#{!! $item['id'] !!}" href="#"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table> 
			</div>
			@foreach($cates as $item)
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
							<a href="" type="button" class="btn btn-default">Đồng ý</a>
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
<!--//outer-wp-->
@endsection()