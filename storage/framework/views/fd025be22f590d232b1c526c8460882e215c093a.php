<?php $__env->startSection('content'); ?>
<div class="content">
	<!-- Phần fix cứng -->
	<div class="title-featured">
		<h3>Sản Phẩm Mới Nhất</h3>
	</div>
	<!-- kết thúc Phần fix cứng -->
	<!-- phần sản phẩm mua nhiều. load những sản phẩm nào order nhiều nhất ra -->
	<div class="featured-product">
		<?php if(count($pros) != 0): ?>
		<?php foreach($pros as $pro): ?>
		<?php if($pro['quantity'] > 0): ?>
		<div class="product ">
			<div class="img-product mask shine text-center">
				<?php $arr = explode('|', $pro['img']); ?> 
				<a href="<?php echo e(route('product.item',$pro['slug'])); ?>"><img src="<?php echo e(asset('uploads/images')); ?>/<?php echo e($arr[0]); ?>" alt="<?php echo e($pro['img_note']); ?>"></a>
			</div>
			<div class="price-product">
				<h3><?php echo e($pro['name']); ?></h3>
				<h4><?php echo e(number_format($pro['price'])); ?> VNĐ</h4>
			</div>
		</div>
		<?php endif; ?>
		<?php endforeach; ?>
		<?php else: ?>
		<h3>Không có sản phẩm nào</h3>
		<?php endif; ?>
	</div>
	<!-- Click vào xem thêm sẽ load qua trang khác listproduct.  -->
	<?php 
		$pros_hot = DB::table('products')->where('hot','=',1)->get();
	?>

	<?php if(count($pros_hot) >= 8): ?>
	<div class="see-more">
		<a href="<?php echo e(route('product.hot')); ?>">Xem Thêm</a>
	</div>
	<?php endif; ?>
	<!-- kết thúc phần sản phẩm mua nhiều. load những sản phẩm nào order nhiều nhất ra -->

	<div class="title-featured">
		<h3>Giảm Giá - Ưu Đãi</h3>

	</div>
	<div class="sale-product">
		<?php if(count($pros2) != 0): ?>
			<?php foreach($pros2 as $pro2): ?>
				<div class="view view-first">
				<?php $arr = explode('|', $pro2['img']); ?> 
					<img src="<?php echo e(asset('uploads/images')); ?>/<?php echo e($arr[0]); ?>" alt="<?php echo e($pro2['img_note']); ?>">
					<a href="<?php echo e(route('product.item',$pro2['slug'])); ?>">
						<div class="mask2">
							<h2>Chi Tiết Sản Phẩm</h2>
							<p><?php echo e($pro2['content']); ?></p>
							<a href="<?php echo e(route('product.addToCart',$pro2['id'])); ?>" class="info">Thêm Vào Giỏ Hàng</a>
						</div>
					</a>
					<div class="price-product-sale">
						<h3><?php echo e($pro2['name']); ?></h3>
						<h4>Giá : <?php echo e(number_format($pro2['price'])); ?> VNĐ</h4>
						<span>Sale : <?php echo e(number_format($pro2['price'] - $pro2['price']*$pro2['sale']/100)); ?> VNĐ</span>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
		<h3>Không có sản phẩm nào</h3>
		<?php endif; ?>
	</div>
	<?php 
		$pros_sale = DB::table('products')->where('sale','<>',0)->get();
	?>
	<?php if(count($pros_sale) >= 6): ?>
	<div class="see-more">
		<a href="<?php echo e(route('product.sale')); ?>">Xem Thêm</a>
	</div>
	<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>