@extends('admin.master')
@section('content')

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="#">Home</a></li>
			<li class="active">Thêm Bài Viết</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="forms-main">
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two">Thêm Bài Viết </h3>
                                <h4><a href="{!! URL::route('admin.article.getListarticle')!!}" type="button" class="btn btn-default">
					<i class="fa fa-list-alt" aria-hidden="true"></i> Danh sách bài viết</a>
				</h4>
				<div class="grid-1">
					<div class="form-body">
						<form class="form-horizontal" action="{!! route('admin.article.getAddarticle') !!}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{!! csrf_token()  !!}" />
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Phân Loại</label>
								<div class="col-sm-6">
									<select name="article_menu_id" class="form-control1">
										<option value="0">Loại sản phẩm</option>
										@foreach($article_menu as $item)
											@if($item['parent'] != 0 && $item['is_active'] == 1)
												<option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Tiêu Đề</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="name" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Mô Tả</label>
								<div class="col-sm-6"><textarea name="description" id="editor1" cols="50" rows="4" class="form-control1"></textarea>
									<script type="text/javascript">CKEDITOR.replace('description'); </script>
								</div>
							</div>											
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Nội dung</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="content" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Nổi bật</label>
								<div class="col-sm-6">
									<select name="hot" class="form-control1">
										<option value="1">Nổi bật</option>
										<option value="0">Không</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Hiển thị</label>
								<div class="col-sm-6">
									<select name="is_active" class="form-control1">
										<option value="1">Hiển thị</option>
										<option value="0">Ẩn</option>
									</select>
								</div>
							</div>
							<?php 
								use App\Admin;
								$staff = Auth::guard('admin')->user();
							?>
							<input type="hidden" class="form-control1" id="" name="admin_id" value="{{ $staff['id'] }}" required>

							<button type="submit" style="margin-left:45%" class="btn btn-default">Thêm Mới</button>	
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