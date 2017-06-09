<!DOCTYPE html>
<html>
<head>
	<?php echo $__env->make('frontend.includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
	<div id="wrapper" >
		<!-- Phần Header -->
		<header>
			<!-- Phần Top-header -->
				<?php echo $__env->make('frontend.includes.headertop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<!-- kết thúc bot-header -->
			<!-- phần menu -->
				<!-- Phần thanh menu ẩn. Khi lắn chuột sẽ hiện ra -->
				<?php echo $__env->make('frontend.includes.menuhidden', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<!-- Kết thúc Phần thanh menu ẩn. Khi lắn chuột sẽ hiện ra -->
			<!-- phần table khi click vào giỏ hàng sẽ hiện ra -->
				<?php echo $__env->make('frontend.includes.shoppingcartdown', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<!-- kết thúc phần table khi click vào giỏ hàng sẽ hiện ra -->
		</header>
		<!-- kết thúc header -->
		<!-- phần navigation -->
			<?php echo $__env->make('frontend.includes.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- Đóng phần navigation -->
		
		<?php /* Phan content */ ?>
			<?php echo $__env->yieldContent('content'); ?>
		<?php /* Ket thuc */ ?>
		<div class="back-to-top" id="bt-top">
			<a href="#" class="hvr-icon-wobble-vertical"></a>
		</div>
			<?php echo $__env->make('frontend.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>

	<?php echo $__env->make('frontend.includes.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>