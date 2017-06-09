<?php $__env->startSection('content'); ?>
<div class="content">
	
	<?php foreach($product_item_one as $var): ?>

	<div class="name-product">
		<h2><?php echo e($var->name); ?></h2>
	</div>
	<div class="header-detail-product">
		<div class="img-detail-product">
			<div class="w3-content" style="max-width:1200px">
				<?php $arr = explode('|', $var->img ); ?>
				<?php if(count($arr) == 1): ?>
					<img class="mySlides big-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[0]; ?>" alt="<?php echo e($var->img_note); ?>" >
					<div class="w3-row-padding w3-section" style="margin-top: 20px">
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[0]; ?>" alt="<?php echo e($var->img_note); ?>" onclick="currentDiv(1)">
						</div>
					</div>
				<?php elseif(count($arr) == 2): ?>
					<img class="mySlides big-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[0]; ?>" alt="<?php echo e($var->img_note); ?>" >
					<img class="mySlides big-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[1]; ?>" alt="<?php echo e($var->img_note); ?>" >
					<div class="w3-row-padding w3-section" style="margin-top: 20px">
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[0]; ?>" alt="<?php echo e($var->img_note); ?>" onclick="currentDiv(1)">
						</div>
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[1]; ?>" alt="<?php echo e($var->img_note); ?>" onclick="currentDiv(2)">
						</div>
					</div>
				<?php else: ?>
					<img class="mySlides big-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[0]; ?>" alt="<?php echo e($var->img_note); ?>" >
					<img class="mySlides big-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[1]; ?>" alt="<?php echo e($var->img_note); ?>" >
					<img class="mySlides big-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[2]; ?>" alt="<?php echo e($var->img_note); ?>" >
					<div class="w3-row-padding w3-section" style="margin-top: 20px">
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[0]; ?>" alt="<?php echo e($var->img_note); ?>" onclick="currentDiv(1)">
						</div>
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[1]; ?>" alt="<?php echo e($var->img_note); ?>" onclick="currentDiv(2)">
						</div>
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off small-img-pro" src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[2]; ?>" alt="<?php echo e($var->img_note); ?>" onclick="currentDiv(3)">
						</div>
					</div>
				<?php endif; ?>
				
			</div>
		</div>
		<div class="right-detail">
			<h3>Mã Sản Phẩm : P0<?php echo e($var->id); ?></h3>
			<h3>Giá : <?php echo e(number_format($var->price)); ?> VNĐ</h3>
			<h3>Số Lượng  : <?php echo e($var->quantity); ?></h3>
			<i class="fa fa-thumbs-up" aria-hidden="true"></i><i>Giao Hàng Toàn Quốc Miễn Phí</i> <br>
			<i class="fa fa-thumbs-up" aria-hidden="true"></i><i>Nhận Được Ưu Đãi Khi Mua Nhiều Mặt Hàng</i>
			<a href="<?php echo e(route('product.addToCart',$var->id)); ?>" id="" class="btn-addcart fa fa-shopping-basket"> THÊM VÀO GIỎ HÀNG</a>
			<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=250&layout=standard&action=like&size=large&show_faces=true&share=true&height=80&appId" width="100%" height="80" style="border:none;overflow:hidden;margin-top: 50px" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		</div>
		<div class="contact-buy">
			<h3>Bạn Có Thắc Mắc ?</h3>
			<h5>Hãy Liên Hệ Với Chúng Tôi Tại Đây</h5>
			<?php foreach($information as $info): ?>
			<i class="fa fa-phone" aria-hidden="true"> : <?php echo e($info['phone']); ?></i>
			<i class="fa fa-google-plus" aria-hidden="true"> : <?php echo e($info['email']); ?></i>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="content-detail-product tabs_hover">
		<ul>
			<li><a href="#tab-1">Mô Tả Sản Phẩm</a></li>
		</ul>
		<div id="tab-1">
			<p><?php echo $var->description; ?></p>
		</div>
	</div>
</div>

<div class="link-product">
	<a href="#"><h4>Sản Phẩm Cùng Loại </h4></a>
</div>
<div class="sale-product">
	<?php 
		$others = DB::table('products')->where('product_menu_id',$var->product_menu_id)->paginate(3);
	?>
	<?php foreach($others as $other): ?>
		<?php if($other->id != $var->id && $other->quantity > 0): ?>
			<?php /* expr */ ?>
		
		<div class="view view-first">
		<?php $arr = explode('|', $other->img); ?>
		<img src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[0]; ?>" alt="<?php echo $other->name; ?>" />
		<a href="<?php echo e(route('product.item',$other->slug)); ?>">
			<div class="mask2">
				<h2>Chi Tiết Sản Phẩm</h2>
				<p><?php echo strip_tags($other->description); ?></p>
				<a href="<?php echo e(route('product.addToCart',$other->id)); ?>" class="info">Thêm Vào Giỏ Hàng</a>
			</div>
		</a>
		<div class="price-product-sale">
			<h3><?php echo $other->name; ?></h3>
			<span>Giá : <?php echo number_format($other->price); ?> VNĐ</span>
			<?php if($other->sale > 0): ?>
                                <h4>Giá : <?php echo number_format($other->price); ?> VNĐ</h4>
				<span>Sale : <?php echo number_format($other->price - $other->price*$other->sale/100) ; ?> VNĐ</span>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php endforeach; ?>
</div>
<?php endforeach; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>