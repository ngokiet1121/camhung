<?php $__env->startSection('content'); ?>
<style>
	.nav-show-hid{
		display: none;
	}
	.contact-ship{
		display: none;
	}
</style>
<div class="content back-pay">
	<div class="title-cart">
		<h2>GIỎ HÀNG</h2>
	</div>
	<div class="table-cart">
		<form action="#">
			<table class="shop-table">
				<thead>
					<tr>
						<th>Ảnh Sản Phẩm</th>
						<th >Tên Sản Phẩm</th>
						<th>Giá Sản Phẩm</th>
						<th>Số Lượng</th>
						<th>Tổng Cộng</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php if(Session::has('cart')): ?>
					<?php foreach($products as $product): ?>
					<tr class="nav-item-cart">
						<?php $arr = explode('|', $product['item']['img']); ?>
						<td><img src="<?php echo e(asset('uploads/images')); ?>/<?php echo e($arr[0]); ?>" alt=""></td>
						<td><p><?php echo e($product['item']['name']); ?></p></td>
						<td><?php echo e($product['item']['price'] - $product['item']['price']*$product['sale']/100); ?></td>
						<td><?php echo e($product['quantity']); ?></td>
						<td><?php echo e($product['price']); ?></td>
						<td><a href="<?php echo e(route('product.subToCart',$product['item']['id'])); ?>"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
					</tr>
					<?php endforeach; ?>
					<tr class="nav-item-cart">
						<td colspan="3">
							<h3>Tạm Tính : <?php echo e($totalPrice); ?> VNĐ</h3>
						</td>
						<td colspan="3">
							<a  href="<?php echo e(route('checkout')); ?>" type="button" class="btn-addcart fa fa-credit-card-alt ">   THANH TOÁN</a>
						</td>
					</tr>
					<?php else: ?>
						<tr class="nav-item-cart">
						<td colspan="6">
							<h3>Bạn chưa đặt mặt hàng nào cả</h3>
						</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>

		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>