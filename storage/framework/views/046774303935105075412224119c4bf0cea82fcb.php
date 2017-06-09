<?php $__env->startSection('content'); ?>
<div class="content">
	<div class="title-featured">
		<h3>Sản phẩm tìm được</h3>
	</div>
		<div class="featured-product">
		<?php if(count($pros) != 0): ?>
		<?php foreach($pros as $pro): ?>
		<div class="product ">
			<div class="img-product mask shine text-center">
				<?php $arr = explode('|', $pro->img); ?> 
				<a href="<?php echo e(route('product.item',$pro->slug)); ?>"><img src="<?php echo e(asset('uploads/images')); ?>/<?php echo e($arr[0]); ?>" alt="<?php echo e($pro->img_note); ?>"></a>
			</div>
			<div class="price-product">
				<h3><?php echo e($pro->name); ?></h3>
				<h4><?php echo e(number_format($pro->price)); ?> VNĐ</h4>
			</div>
		</div>
		<?php endforeach; ?>
		<?php else: ?>
		<div class="title-cart">
			<h2>Không có sản phẩm nào</h2>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>