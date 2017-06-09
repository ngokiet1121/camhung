@extends('admin.master')
@section('content')

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">Nhân Viên</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="forms-main">
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two">Thêm Nhân Viên</h3>
				<div class="grid-1">
					<div class="form-body">
						<form class="form-horizontal" action="{!! route('admin.staff.getAddStaff') !!}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{!! csrf_token()  !!}" />
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Phân quyền</label>
								<div class="col-sm-6">
									<select name="role_id" class="form-control1">
										@foreach($roles as $item)
											@if ($item['id'] != 1)
												<option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Họ và tên</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="name" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Điện thoại</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="phone" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Địa chỉ</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="address" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-6">
									<input type="email" class="form-control1" id="" name="email" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Mật khẩu</label>
								<div class="col-sm-6">
									<input type="password" class="form-control1" id="" name="password" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Xác nhận m.khẩu</label>
								<div class="col-sm-6">
									<input type="password" class="form-control1" id="" name="com_password" required>
								</div>
							</div>
							<button type="submit" style="margin-left:45%" class="btn btn-default">Thêm Mới</button>	
						</form>
					</div>
				</div>
			</div>
		</div>												
	</div>
	<!--//graph-visual-->
</div>
@endsection()