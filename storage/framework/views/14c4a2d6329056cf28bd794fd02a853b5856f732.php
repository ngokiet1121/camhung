<?php $__env->startSection('content'); ?>
<?php
	$admin = Auth::guard('admin')->user();
?>
<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="<?php echo e(route('admin.home.getIndex')); ?>">Home</a></li>
			<li class="active">Nhân Viên</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h3 class="inner-tittle two">Danh sách Nhân Viên</h3>
		<h4>
			<a href="<?php echo URL::route('admin.staff.getAddStaff'); ?>" type="button" class="btn btn-default">
				<i class="fa fa-plus" aria-hidden="true"></i> Thêm nhân viên</a>
			</h4>
			<div class="graph">
				<div class="data-table">
					<table id="list-table" class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Tên</th>
								<th>Email</th>
								<th>Điện thoại</th>
								<th>Địa chỉ</th>
								<th></th>
							</tr>
						</thead>					
						<tbody>
							<?php $stt = -1;?>
							<?php foreach($staffs as $item): ?>
							<?php $stt = $stt + 1;?>
							<?php if($item['role_id'] > 1): ?>
							<tr>
								<td><?php echo $stt; ?></td>
								<td><?php echo $item['name']; ?></td>
								<td><?php echo $item['email']; ?> </td>
								<td><?php echo $item['phone']; ?> </td>
								<td><?php echo $item['address']; ?> </td>
								<?php if($admin['role_id'] == 1): ?>
								<td>
									<a title="Xóa" data-toggle="modal" data-target="#<?php echo $item['id']; ?>" href="#"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
								</td>
								<?php endif; ?>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
						</tbody>
					</table> 
				</div>
				<?php foreach($staffs as $item): ?>
				<div id="<?php echo $item['id']; ?>" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<span class="modal-title">Xóa dữ liệu</span>
							</div>
							<div class="modal-body">
								<p>Bạn có chắc muốn xóa dự liệu này?</p>
							</div>
							<div class="modal-footer">
							<a href="<?php echo URL::route('admin.staff.getDeleteStaff',$item['id']); ?>" type="button" class="btn btn-default">Đồng ý</a>
								<button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<!--//graph-visual-->
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>