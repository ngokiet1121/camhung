@extends('admin.master')
@section('content')

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">Order</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="forms-main">
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two">Chuyển Trạng thái đơn hàng</h3>
				<div class="grid-1">
					<div class="form-body">
						<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{!! csrf_token()  !!}" />
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Trạng Thái Đơn Hàng</label>
								<div class="col-sm-6">
									<select name="status" class="form-control1">
										<?php 
										$status = $data['status'];
										?>
										@if($status == 1)
										<option value='1' selected="selected" >Đang Chờ</option>
										<option value='2' >Đã Xác Nhận</option>
										<option value='3' >Đã Chuyển</option>
										<option value='4' >Đã Hũy</option>
										@elseif($status == 2)
										<option value='2' selected="selected">Đã Xác Nhận</option>
										<option value='1' >Đang Chờ</option>
										<option value='3' >Đã Chuyển</option>
										<option value='4' >Đã Hũy</option>
										@elseif($status == 3)
										<option value='3' selected="selected">Đã Chuyển</option>
										<option value='1' >Đang Chờ</option>
										<option value='2' >Đã Xác Nhận</option>
										<option value='4' >Đã Hũy</option>
										@elseif($status == 4)
										<option value='4' selected="selected">Đã Hũy</option>
										<option value='1' >Đang Chờ</option>
										<option value='2' >Đã Xác Nhận</option>
										<option value='3' >Đã Chuyển</option>
										@endif
									</select>
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