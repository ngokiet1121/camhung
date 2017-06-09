<?php $__env->startSection('content'); ?>
<style>
	.nav-show-hid{
		display: none;
	}
	.contact-ship{
		display: none;
	}
</style>
<div class="content back-pay ">
	<div class="title-cart">
		<h2>THANH TOÁN</h2>
	</div>
	<div class="pay-order">
		<div class="pay-order-left">
			<div class="inf-customer">
				<h3>THÔNG TIN KHÁCH HÀNG</h3>
				<form action="<?php echo e(route('checkout')); ?>" method="POST" class="form-customer">
					<?php echo e(csrf_field()); ?>

					<div class="short-input fix-right" >
						<input type="text" name="name" placeholder="Họ Và Tên Của Bạn" value="<?php echo e(old('name')); ?>">
					</div>
					<div class="short-input">
						<input type="text" name="phone" placeholder="Số Điện Thoại" value="<?php echo e(old('phone')); ?>">
					</div>
					<div class="long-input">
						<input type="text" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
					</div>
					<div class="text-note">
						<p>Nhập Địa Chỉ Nhận Hàng</p>
					</div>
					<div class="short-input fix-right">
						<input type="text" name="city" placeholder="Thành Phố" value="<?php echo e(old('city')); ?>">
					</div>
					<div class="short-input">
						<input type="text" name='district' placeholder="Quận/Huyện" value="<?php echo e(old('district')); ?>">
					</div>
					<div class="long-input">
						<input type="text" name="address" placeholder="Số Nhà, Tên Đường, Phường/Xã" value="<?php echo e(old('address')); ?>">
					</div>
					<div class="text-note">
						<p>Yêu Cầu Khác</p>
					</div>
					<div class="long-input">
						<input type="text" name="content"  placeholder="Yêu Cầu Khác ( Không Bắt Buộc )" value="<?php echo e(old('content')); ?>">
					</div>
					<div class="buy-button">
						<input type="submit" value="Gủi" />
					</div>
					<?php if(count($errors)>0): ?>
						<div style="color: #a94442; background-color: #f2dede; border-color: #ebccd1;">
							<ul style="margin-top: 10px; padding-top: 10px; padding-bottom: 10px;">
								<?php foreach($errors->all() as $error): ?>
								<li><strong>LỖI! </strong><?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
				</form>
			</div>
		</div>
		<div class="pay-order-right">
			<div class="inf-customer">
				<h3>TÓM TẮT ĐƠN HÀNG</h3>
				<form action="#">
					<table class="order-table">
						<thead>
							<tr>
								<th>Tên Sản Phẩm</th>
								<th>Số Lượng</th>
								<th>Giá</th>
							</tr>
						</thead>
						<tbody>
							<?php if(Session::has('cart')): ?>
							<?php foreach($products as $product): ?>
							<tr class="item-cart">
								<td><p><?php echo e($product['item']['name']); ?></p></td>
								<td><p><?php echo e($product['quantity']); ?></p></td>
								<td><?php echo e($product['price']); ?></td>
							</tr>
							<?php endforeach; ?>
							<tr class="item-cart2">
								<td colspan="3">
									<h3>Tổng Cộng : <?php echo e($totalPrice); ?> VNĐ</h3>
								</td>
							</tr>
							<?php else: ?>
							<?php endif; ?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>