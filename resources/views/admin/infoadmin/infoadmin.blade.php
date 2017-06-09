@extends('admin.master')
@section('content')

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">Thông tin tài khoản</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="forms-main">
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two">Thông tin tài khoản</h3>
				<div class="grid-1">
					<div class="form-body">
						<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{!! csrf_token()  !!}" />
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Họ tên</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="name" value="{!! old('name',isset($admin)?$admin['name'] : null ) !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Điện thoại</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="phone" value="{!! old('phone',isset($admin)?$admin['phone'] : null ) !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Địa chỉ</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="address" value="{!! old('address',isset($admin)?$admin['address'] : null ) !!}" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Ảnh đại diện</label>
								<div class="col-sm-6">
									<input type="file" class="form-control1" id="fuImage" name="fuImage" accept="image/*">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
								</div>
								<div id="image-holder" class="col-sm-2">
									<img src="{{ asset('') }}{!! old('img',isset($admin)?$admin['img'] : null ) !!}" class="thumb-image" alt="">
								</div>
							</div>
							<!-- <div class="form-group">
								<label for="" class="col-sm-2 control-label">Mật khẩu</label>
								<div class="col-sm-6">
									<input type="password" class="form-control1" id="" name="password" value="" required>
								</div>
							</div> -->
							<button type="submit" style="margin-left:45%" class="btn btn-default">Cập nhập</button>	
						</form>
					</div>

				</div>
			</div>
		</div>												
	</div>
	<!--//graph-visual-->
</div>

<script>
	$(document).ready(function() {
		$("#fuImage").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
          	if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
              	var reader = new FileReader();
              	reader.onload = function(e) {
              		$("<img />", {
              			"src": e.target.result,
              			"class": "thumb-image"
              		}).appendTo(image_holder);
              	}
              	image_holder.show();
              	reader.readAsDataURL($(this)[0].files[i]);
              }
          } else {
          	alert("This browser does not support FileReader.");
          }
      } else {
      	alert("Pls select only images");
      }
  });
	});
</script>

@endsection()