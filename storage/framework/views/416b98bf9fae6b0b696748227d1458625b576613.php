<!DOCTYPE HTML>
<html>
<head>
	<?php echo $__env->make('admin.includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head> 
<body>
<?php
	$admin = Auth::guard('admin')->user();
?>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<div class="header-section">
					<!--menu-right-->
					<?php echo $__env->make('admin.includes.top_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="col-lg-12">
					<?php if(Session::has('flash_message')): ?>
					<div class="alert alert-success" >
						<strong>Hoàn tất! </strong><?php echo Session::get('flash_message'); ?>

					</div>
					<?php endif; ?>
					<script type="text/javascript">
						$("div.col-lg-12").delay(3000).slideUp();
					</script>
				</div>
				<div class="col-lg-12">
					<?php if(Session::has('err_message')): ?>
					<div class="alert alert-danger" >
						<strong>Lỗi! </strong><?php echo Session::get('err_message'); ?>

					</div>
					<?php endif; ?>
					<script type="text/javascript">
						$("div.col-lg-12").delay(3000).slideUp();
					</script>
				</div>
                                <div class="col-lg-12">
						<?php if(count($errors)>0): ?>
						<div class="alert alert-danger" >
							<ul>
								<?php foreach($errors->all() as $error): ?>
								<li><strong>Lỗi! </strong><?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
					</div>
				<?php echo $__env->yieldContent('content'); ?>

				<!--//outer-wp-->
				<!--footer section start-->
				<footer>
					<p>&copy 2016 Augment . All Rights Reserved | Design by <a href="#" target="_blank">TKV.Team</a></p>
				</footer>
				<!--footer section end-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->

		<!--/down-->
		<?php echo $__env->make('admin.includes.adminface', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!--//down-->
		<?php echo $__env->make('admin.includes.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<div class="clearfix"></div>		
</div>


<?php echo $__env->make('admin.includes.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>