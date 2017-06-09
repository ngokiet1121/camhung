<?php $__env->startSection('content'); ?>
<div class="content">
	<div class="title-featured">
			<h3>Giảm Giá - Ưu Đãi</h3>
		<div class="list-item-category">
		</div>
	</div>
	<div class="featured-product">
	
			<?php foreach($pros_sale as $val): ?>
				
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

			<?php endforeach; ?>
	</div>

	<div class="see-more">
		<ul class="pagination">
	        	<?php if($pros_sale->currentPage() != 1): ?>
	            	<li><a href="<?php echo str_replace('/?','?',$pros_sale->url($pros_sale->currentPage() - 1)); ?>">Prev</a></li>
			<?php endif; ?>
	            <?php for($i = 1;$i <= $pros_sale->lastPage() ; $i++): ?>
	            	<li class="active" >
	            		<a  href="<?php echo str_replace('/?','?',$pros_sale->url($i)); ?>"><?php echo $i; ?></a>
	            	</li>
	            <?php endfor; ?>
			<?php if($pros_sale->currentPage() != $pros_sale->lastPage()): ?>
	            	<li><a href="<?php echo str_replace('/?','?',$pros_sale->url($pros_sale->currentPage() + 1)); ?>">Next</a></li>
	            <?php endif; ?>
	        </ul>
	</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>