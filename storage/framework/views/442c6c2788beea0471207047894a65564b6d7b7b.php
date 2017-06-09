<div class="header">
	<div class="left-all-header ">
		<div class="left-header">
			<div class="clock">
				<div id="Date"></div>
				<ul>
					<li id="hours"></li>
					<li class="point">:</li>
					<li id="min"></li>
					<li class="point">:</li>
					<li id="sec"></li>
				</ul>
			</div>
		</div>
		
		<div class="right-header" style="float: right;">
			<ul>
				<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="<?php echo e(route('product.shoppingCart')); ?>">Giỏ Hàng
					<?php if(!Session::has('cart')): ?>
						<span class="badge"></span>
					<?php else: ?>
					<span class="badge"><?php echo e(Session::has('cart') ? Session::get('cart')->totalQuantity : ''); ?></span>
					<?php endif; ?>
				</a>

				</li>
			</ul>
		</div>
	</div>					
</div>
<!-- Kết thúc Top-Header -->
<!-- Phần bot-header -->
<div class="bot-header">
	<div class="logo">
		<a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('uploads/images')); ?>/logo3.png" alt="home"></a>
	</div>
	<div class="contact">
		<ul>
		<li><a>Liên hệ chúng tôi</a></li>
			<?php foreach($information as $info): ?>
			
			<li><i class="fa fa-phone" style="color: #f96332" aria-hidden="true"></i><a href="#"><?php echo e($info['phone']); ?></a></li>
			<li><i class="fa fa-map-marker" style="color: #f96332" aria-hidden="true"></i><a href="#"><?php echo e($info['address']); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>