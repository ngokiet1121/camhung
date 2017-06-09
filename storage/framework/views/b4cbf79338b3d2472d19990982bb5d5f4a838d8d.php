<div class="nav-menu-scroll">
	<div class="list-menu-scroll">
		<ul>
			
			<?php foreach($product_menu as $item): ?>
			<?php if($item['parent'] == 0): ?>
			<li class="parent-scroll"><a href="<?php echo e(route('product',$item['slug'])); ?>"><?php echo e($item['name']); ?></a>
				<?php 
				$product_menu2 = DB::table('product_menu')->where('parent','=', $item['id'])->get();
				?>
				<ul>
					<?php foreach($product_menu2 as $item2): ?>
					<li><a href="<?php echo e(route('product',$item2->slug)); ?>" > <?php print_r($item2->name); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</li>
			<?php endif; ?>
			<?php endforeach; ?>

			<li><a href="#">Liên Hệ</a></li>
		</ul>
		<!-- nút giỏ hàng -->
		<div class="click-cart right-menu-sroll">
			<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
		</div>
		<!-- kêt thúc nút giỏ hàng -->
	</div>
</div>