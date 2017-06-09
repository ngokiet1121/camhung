<?php $__env->startSection('content'); ?>
<div class="content">
	<div class="title-featured">
			<h3><?php echo e($name); ?></h3>
		<div class="list-item-category">

		<?php 
		if($parent == 0){
			$menusm = DB::table('product_menu')->where('parent',$id)->get();
		}else{
			$menusm = DB::table('product_menu')->where('parent',$parent)->get();
		}
		?>
			<ul>
			<?php foreach($menusm as $sm): ?>
				<li><a href="<?php echo e(route('product',$sm->slug)); ?>"><?php echo $sm->name; ?></a></li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="featured-product">
		<?php 
			$pro_menub = DB::table('product_menu')->where('id',$id)->first();	
		?>
		<?php if($pro_menub->parent == 0): ?>
			<?php 
				$pro_menusm = DB::table('product_menu')->where('parent',$id)->get(); 
				
			?>
			<?php if(count($pro_menusm) != 0): ?>
			<?php foreach($pro_menusm as $pro_menusm_item): ?>
				<?php 
					$pro_items = DB::table('products')->where('product_menu_id',$pro_menusm_item->id)->paginate(12);
				?>
				<?php foreach($pro_items as $val): ?>
				<?php if(count($val) > 0): ?>
					
				
					<?php if($val->quantity > 0): ?>
						<div class="product ">
							<div class="img-product mask shine text-center">
							<?php $arr = explode('|', $val->img); ?>
								<a href="<?php echo e(route('product.item',$val->slug)); ?>"><img src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[0]; ?>" alt=""></a>
							</div>
							<div class="price-product">
								<h3><?php echo $val->name; ?></h3>
								<h4><?php echo number_format($val->price); ?> VNĐ</h4>
							</div>
						</div>
					<?php endif; ?>
				<?php else: ?>
				<div class="product">
					<div class="title-cart">
						<h2>Không có sản phẩm nào</h2>
					</div>
				</div>	
				<?php endif; ?>
				<?php endforeach; ?>
			<?php endforeach; ?>
			
			<?php endif; ?>
		<?php else: ?>
			<?php 
				$pro_items = DB::table('products')->where('product_menu_id',$id)->paginate(12);
			?>
			<?php if(count($pro_items) != 0): ?>
				<?php /* expr */ ?>
			
			<?php foreach($pro_items as $val): ?>
				
					<?php if($val->quantity > 0): ?>
						<div class="product ">
							<div class="img-product mask shine text-center">
							<?php $arr = explode('|', $val->img); ?>
								<a href="<?php echo e(route('product.item',$val->slug)); ?>"><img src="<?php echo e(asset('uploads/images')); ?>/<?php echo $arr[0]; ?>" alt=""></a>
							</div>
							<div class="price-product">
								<h3><?php echo $val->name; ?></h3>
								<h4><?php echo number_format($val->price); ?> VNĐ</h4>
							</div>
						</div>
					<?php endif; ?>

			<?php endforeach; ?>
			<?php else: ?>
				<div class="product">
					<div class="title-cart">
						<h2>Không có sản phẩm nào</h2>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>

	<?php if($pro_items->currentPage() > 1): ?>
	<div class="see-more">
		<ul class="pagination">
        	<?php if($pro_items->currentPage() != 1): ?>
            	<li><a href="<?php echo str_replace('/?','?',$pro_items->url($pro_items->currentPage() - 1)); ?>">Trước</a></li>
			<?php endif; ?>
            <?php for($i = 1;$i <= $pro_items->lastPage() ; $i++): ?>
            	<li class="active" >
            		<a  href="<?php echo str_replace('/?','?',$pro_items->url($i)); ?>"><?php echo $i; ?></a>
            	</li>
            <?php endfor; ?>
			<?php if($pro_items->currentPage() != $pro_items->lastPage()): ?>
            	<li><a href="<?php echo str_replace('/?','?',$pro_items->url($pro_items->currentPage() + 1)); ?>">Sau</a></li>
            <?php endif; ?>
        </ul>
	</div>
	<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>