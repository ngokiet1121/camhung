<?php $__env->startSection('content'); ?>

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="<?php echo e(route('admin.home.getIndex')); ?>">Home</a></li>
			<li class="active">Ảnh</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="forms-main">
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two">Thay đổi hình ảnh</h3>
                                <h4><a href="<?php echo URL::route('admin.gallery.getList'); ?>" type="button" class="btn btn-default">
					<i class="fa fa-list-alt" aria-hidden="true"></i> Danh sách hình ảnh</a>
				</h4>
				<div class="grid-1">
					<div class="form-body">
						<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />

							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Tiêu Đề</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="name" value="<?php echo old('name',isset($data)?$data['name'] : null ); ?>" required>
								</div>
							</div>

							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Content</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="content" value="<?php echo old('content',isset($data)?$data['content'] : null ); ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Loại ảnh</label>
								<div class="col-sm-6">
									<select name="parent" class="form-control1">
										<?php 
										$id = $data['parent'];
										?>
										<?php if($id == 1): ?>
										<option value="1">Slide</option>
										<option value="2">Album</option>
										<?php else: ?>
										<option value="2">Album</option>
										<option value="1">Slide</option>
										<?php endif; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Active</label>
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
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Ảnh</label>
								<div class="col-sm-6">
									<input type="file" class="form-control1" id="fuImage" name="fuImage" accept="image/*">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
								</div>
								<div id="image-holder" class="col-sm-2">
									<img src="<?php echo e(asset('')); ?><?php echo old('img',isset($data)?$data['img'] : null ); ?>" class="thumb-image" alt="<?php echo old('img_note',isset($data)?$data['img_note'] : null ); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>