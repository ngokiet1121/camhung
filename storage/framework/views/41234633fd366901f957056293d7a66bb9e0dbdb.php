<?php $__env->startSection('content'); ?>
<div class="content">
	<div class="title-featured">
			<h3>Sản phẩm nổi bật</h3>
		<div class="list-item-category">
		</div>
	</div>
	<div class="featured-product">
			<?php foreach($pros_hot as $val): ?>
			<?php if($val['quantity'] > 0): ?>				
				<div class="product ">
					<div class="img-product mask shine text-center">
					<?php $arr = explode('|', $val['img']); ?>
						<a href="<?php echo e(route('product.item',$val->slug)); ?>"><img src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[0]; ?>" alt=""></a>
					</div>
					<div class="price-product">
						<h3><?php echo e($val['name']); ?></h3>
						<h4><?php echo e(number_format($val['price'])); ?> VNĐ</h4>
					</div>
				</div>
			<?php endif; ?>
			<?php endforeach; ?>
	</div>

	<div class="see-more">
		<ul class="pagination">
	        	<?php if($pros_hot->currentPage() != 1): ?>
	            	<li><a href="<?php echo str_replace('/?','?',$pros_hot->url($pros_hot->currentPage() - 1)); ?>">Prev</a></li>
			<?php endif; ?>
	            <?php for($i = 1;$i <= $pros_hot->lastPage() ; $i++): ?>
	            	<li class="active" >
	            		<a  href="<?php echo str_replace('/?','?',$pros_hot->url($i)); ?>"><?php echo $i; ?></a>
	            	</li>
	            <?php endfor; ?>
			<?php if($pros_hot->currentPage() != $pros_hot->lastPage()): ?>
	            	<li><a href="<?php echo str_replace('/?','?',$pros_hot->url($pros_hot->currentPage() + 1)); ?>">Next</a></li>
	            <?php endif; ?>
	        </ul>
	</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>