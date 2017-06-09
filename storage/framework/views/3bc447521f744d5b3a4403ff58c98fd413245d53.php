<?php $__env->startSection('content'); ?>

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="<?php echo e(route('admin.home.getIndex')); ?>">Home</a></li>
			<li class="active">Loại Sản Phẩm</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="forms-main">
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two">Sửa thông tin Loại Sản Phẩm</h3>
                                <h4><a href="<?php echo URL::route('admin.product.getListmenu'); ?>" type="button" class="btn btn-default">
					<i class="fa fa-list-alt" aria-hidden="true"></i> Danh sách Loại sản phẩm</a>
				</h4>
				<div class="grid-1">
					<div class="form-body">
						<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Loại Sản Phẩm</label>
								<div class="col-sm-6">
									<select name="parent" class="form-control1">
										<option value='0' >Loại sản phẩm</option>
										<?php 
										$menu = DB::table('product_menu')->get();
										$parent = $data['parent'];
										//$id = $data['id'];
										foreach ($menu as $val) {
											if($val->parent == 0 ){
												if( $val->id == $parent){
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
									<input type="text" class="form-control1" id=""  value="<?php echo old('name',isset($data)?$data['name'] : null ); ?>"  name="name" required>
								</div>
							</div>
<?php /* 							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Mô Tả</label>
								<div class="col-sm-8"><textarea name="description_vi" id="editor1" cols="50" rows="4" class="form-control1"></textarea>
									<script type="text/javascript">CKEDITOR.replace('description_vi'); </script>
								</div>
							</div> */ ?>											
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Mô tả ngắn</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" value="<?php echo old('content',isset($data)?$data['content'] : null ); ?>" id="" name="content" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Nổi bật</label>
								<div class="col-sm-6">
									<select name="hot" class="form-control1">
										<?php 
										$id = $data['hot'];
										?>
										<?php if($id == 1): ?>
										<option value="1">Nổi bật</option>
										<option value="0">Không</option>
										<?php else: ?>
										<option value="0">Không</option>
										<option value="1">Nổi bật</option>
										<?php endif; ?>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Hiển thị</label>
								<div class="col-sm-6">
									<select name="is_active" class="form-control1">
										<?php 
										$id = $data['is_active'];
										?>
										<?php if($id == 1): ?>
										<option value="1">Hiển thị</option>
										<option value="0">Ẩn</option>
										<?php else: ?>
										<option value="0">Ẩn</option>
										<option value="1">Hiển thị</option>
										<?php endif; ?>
									</select>
								</div>
							</div>

							<?php /* <div class="form-group">
								<label for="" class="col-sm-2 control-label">Ảnh sản phẩm</label>
								<div class="col-sm-6">
									<input type="file" class="form-control1" id="fuImage" name="fuImage" accept="image/*">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
								</div>
								<div id="image-holder" class="col-sm-2">
								</div>
							</div> */ ?>

							<button type="submit" style="margin-left:45%" class="btn btn-default">Cập Nhập</button>	
						</form>
					</div>

				</div>
			</div>
		</div>												
	</div>
	<!--//graph-visual-->
</div>

<?php /* <script>
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
</script> */ ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>