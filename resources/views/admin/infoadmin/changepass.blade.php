@extends('admin.master')
@section('content')

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">Mật khẩu</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="forms-main">
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two">Đổi mật khẩu</h3>
				<div class="grid-1">
					<div class="form-body">
						<form class="form-horizontal" action="{{ URL::route('admin.infoadmin.getChangePass') }}" method="POST">
							<input type="hidden" name="_token" value="{!! csrf_token()  !!}" />

							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Mật khẩu cũ</label>
								<div class="col-sm-6">
									<input type="password" class="form-control1" id="" name="txtOldPass" required>
								</div>
							</div>

							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Mật khẩu mới</label>
								<div class="col-sm-6">
									<input type="password" class="form-control1" id="" name="txtNewPass"  required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Xác nhận m.khẩu</label>
								<div class="col-sm-6">
									<input type="password" class="form-control1" id="" name="txtConfirmPass"  required>
								</div>
							</div>
							<button type="submit" style="margin-left:45%" class="btn btn-default">Đổi mật khẩu</button>	
						</form>
					</div>

				</div>
			</div>
		</div>												
	</div>
	<!--//graph-visual-->
</div>
@endsection()