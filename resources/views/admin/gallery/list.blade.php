@extends('admin.master')
<!--outter-wp-->
@section('content')

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">Ảnh</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h3 class="inner-tittle two">Danh sách hình ảnh</h3>
			<h4>
			<a href="{!! URL::route('admin.gallery.getAdd')!!}" type="button" class="btn btn-default">
				<i class="fa fa-plus" aria-hidden="true"></i> Thêm mới hình ảnh</a>
			</h4>
		<div class="graph">
			<div class="data-table">
				<table id="list-table" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Ảnh</th>
							<th>Mục ảnh</th>
							<th></th>
						</tr>
					</thead>					
					<tbody>
						<?php $stt = 0;?>
						@foreach($galleries as $item)
						<?php $stt = $stt + 1;?>
						<tr>
							<td>{!! $stt !!}</td>
							<td><img height="100px" src="{{asset('')}}/{!! $item['img'] !!}" alt="{!! $item['img_note'] !!}"></td>
							<td>{!! $item['parent'] !!} </td>
							<td>
								<a href="{!! URL::route('admin.gallery.getEdit',$item['id']) !!}" title="Sửa"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></a>
								<a title="Xóa" data-toggle="modal" data-target="#{!! $item['id'] !!}2" href="#"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table> 
			</div>
			@foreach($galleries as $item)
			<div id="{!! $item['id'] !!}" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<span class="modal-title">{!! $item['content'] !!}</span>
						</div>
						<div class="modal-body">
							<img src="{{ asset('') }}{!! $item['img'] !!}" alt="{!! $item['img_note'] !!}">
						</div>
						<div class="modal-footer">
							<a href="" type="button" class="btn btn-default">Đồng ý</a>
							<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@foreach($galleries as $item)
			<div id="{!! $item['id'] !!}2" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<span class="modal-title">Xóa hình ảnh</span>
						</div>
						<div class="modal-body">
							<p>Bạn có chắc muốn xóa dự liệu này?</p>
						</div>
						<div class="modal-footer">
							<a href="{!! URL::route('admin.gallery.getDelete',$item['id']) !!}" type="button" class="btn btn-default">Đồng ý</a>
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