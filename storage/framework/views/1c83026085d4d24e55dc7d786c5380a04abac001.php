<?php $__env->startSection('content'); ?>

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="<?php echo e(route('admin.home.getIndex')); ?>">Home</a></li>
			<li class="active">Sản Phẩm</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="forms-main">
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two">Thêm Sản Phẩm </h3>

				<div class="grid-1">
					<div class="form-body">
						<form class="form-horizontal" action="<?php echo route('admin.product.getAddproduct'); ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Phân Loại</label>
								<div class="col-sm-6">
									<select name="product_menu_id" class="form-control1">
										<option value="0">Loại sản phẩm</option>
										<?php foreach($product_menu as $item): ?>
											<?php if($item['parent'] != 0 && $item['is_active'] == 1): ?>
												<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
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
								<label for="" class="col-sm-2 control-label">Giới thiệu ngắn</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="content" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Đơn giá</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="price" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Số lượng</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="quantity" required>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Giảm giá (%)</label>
								<div class="col-sm-6">
									<input type="text" class="form-control1" id="" name="sale" required>
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
							<div class="form-group hidden">
								<label for="" class="col-sm-2 control-label">Hiển thị</label>
								<div class="col-sm-6">
									<select name="is_active" class="form-control1">
										<option value="1">Hiển thị</option>
										<option value="0">Ẩn</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Ảnh sản phẩm</label>
								<div class="col-sm-6">
									<input type="file" class="form-control1" id="fuImage" name="fuImage[]" accept="image/*" multiple="">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-2">
								</div>
								<div id="image-holder" class="col-sm-2">
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