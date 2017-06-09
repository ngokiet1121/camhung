<!--outter-wp-->
<?php $__env->startSection('content'); ?>

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="<?php echo e(route('admin.home.getIndex')); ?>">Home</a></li>
			<li class="active">OrderDetail</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h3 class="inner-tittle two">Danh sách chi tiết đơn hàng</h3>
                <h4><a href="<?php echo URL::route('admin.order.getList'); ?>" type="button" class="btn btn-default">
					<i class="fa fa-list-alt" aria-hidden="true"></i> Danh sách đơn hàng</a>
				</h4>
		<div class="graph">
			<div class="data-table">
				<table id="list-table" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Giảm giá</th>
							<th>Giá</th>
							<th>Mã hóa đơn</th>
							<th></th>
						</tr>
					</thead>					
					<tbody>
						<?php $stt = 0;?>
						<?php foreach($orderdetail as $item): ?>
						<?php $stt = $stt + 1;?>
						<tr>
							<td><?php echo $stt; ?></td>
							<td><?php echo $item['name']; ?></td>
							<td><?php echo $item['quantity']; ?> </td>
							<td><?php echo $item['sale']; ?></td>
							<td><?php echo $item['price']; ?> </td>
							<td>
								<?php echo $item['order_id']; ?>

							</td>
							<td>
								
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table> 
			</div>
		</div>
	</div>
	<!--//graph-visual-->
</div>
<!--//outer-wp-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>