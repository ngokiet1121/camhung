@extends('admin.master')
@section('content')

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{ route('admin.home.getIndex') }}">Home</a></li>
			<li class="active">Sản phẩm</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="forms-main">
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two">Sửa thông tin Sản Phẩm</h3>
				<div class="grid-1">
					<div class="form-body">
						<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{!! csrf_token()  !!}" />
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Phân Loại</label>
								<div class="col-sm-6">
									<select name="product_menu_id" class="form-control1">
										<option value="0">Loại sản phẩm</option>
										<?php 
										$menu = DB::table('product_menu')->get();
										$parent = $data['product_menu_id'];
										//$id = $data['id'];
										foreach ($menu as $val) {

											if($val->parent != 0 ){
												if($val->id == $parent){
													echo "<option value='$val->id' selected='selected' >$val->name</option>";
												}else{
													echo "<option value='$val->id'>$val->name</option>";
												}
											}
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Tiêu Đề</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="name" value="{!! old('name',isset($data)?$data['name'] : null ) !!}" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Mô Tả</label>
								<div class="col-sm-6"><textarea name="description" id="editor1" cols="50" rows="4" class="form-control1">
									{!! old('description',isset($data)?$data['description'] : null ) !!}
								</textarea>
								<script type="text/javascript">CKEDITOR.replace('description'); </script>
							</div>
						</div>											
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Giới thiệu ngắn</label>
							<div class="col-sm-6">
								<input type="text" class="form-control1" id="" name="content" value="{!! old('content',isset($data)?$data['content'] : null ) !!}" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Đơn giá</label>
							<div class="col-sm-6">
								<input type="text" class="form-control1" id="" name="price" value="{!! old('price',isset($data)?$data['price'] : null ) !!}" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Số lượng</label>
							<div class="col-sm-6">
								<input type="text" class="form-control1" id="" name="quantity" value="{!! old('quantity',isset($data)?$data['quantity'] : null ) !!}" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Giảm giá (%)</label>
							<div class="col-sm-6">
								<input type="text" class="form-control1" id="" name="sale" value="{!! old('sale',isset($data)?$data['sale'] : null ) !!}" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Nổi bật</label>
							<div class="col-sm-6">
								<select name="hot" class="form-control1">
									<?php 
									$id = $data['hot'];
									?>
									@if($id == 1)
									<option value="1">Nổi bật</option>
									<option value="0">Không</option>
									@else
									<option value="0">Không</option>
									<option value="1">Nổi bật</option>
									@endif

								</select>
							</div>
						</div>
						<div class="form-group hidden">
							<label for="" class="col-sm-2 control-label">Hiển thị</label>
							<div class="col-sm-6">
								<select name="is_active" class="form-control1">
									<?php 
									$id = $data['is_active'];
									?>
									@if($id == 1)
									<option value="1">Hiển thị</option>
									<option value="0">Ẩn</option>
									@else
									<option value="0">Ẩn</option>
									<option value="1">Hiển thị</option>
									@endif
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Ảnh sản phẩm</label>
							<div class="col-sm-6">
								<input type="file" class="form-control1" id="fuImage" name="fuImage[]" accept="image/*" multiple="">
							</div>
						</div>
                                                <?php
                                                  $imgs = explode('|',$data['img']);
                                                  ?>
						<div class="form-group">
							<div class="col-sm-2">
							</div>
                                                       @foreach($imgs as $item)
							<div id="image-holder" class="col-sm-2">
								<img src="{{ asset('uploads/images') }}/{!! $item !!}" class="thumb-image" alt="">
							</div>                                                       
                                                        @endforeach
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