@extends('admin.master')
@section('content')

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">Thông Tin Công Ty</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="forms-main">
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two">Thông tin công ty</h3>
				<div class="grid-1">
					<div class="form-body">
						<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{!! csrf_token()  !!}" />

							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Tên công ty</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="name" value="{!! old('name',isset($data)?$data['name'] : null ) !!}" required>
								</div>
							</div>

							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Điện thoại</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="phone" value="{!! old('phone',isset($data)?$data['phone'] : null ) !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Địa chỉ</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="address" value="{!! old('address',isset($data)?$data['address'] : null ) !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="email" value="{!! old('email',isset($data)?$data['email'] : null ) !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Trang web</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="link" value="{!! old('link',isset($data)?$data['link'] : null ) !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Fax</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="fax" value="{!! old('fax',isset($data)?$data['fax'] : null ) !!}" required>
								</div>
							</div>
							<button type="submit" style="margin-left:45%" class="btn btn-default">Cập Nhập</button>	
						</form>
					</div>

				</div>
			</div>
		</div>												
	</div>
	<!--//graph-visual-->
</div>
@endsection()