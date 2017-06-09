<!--outter-wp-->
<?php $__env->startSection('content'); ?>


<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="<?php echo e(route('admin.home.getIndex')); ?>">Home</a></li>
			<li class="active">Tin Tức</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h3 class="inner-tittle two">Danh sách liên hệ</h3>
		<div class="graph">
			<div class="data-table">
				<table id="list-table" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Họ tên</th>
							<th>Địa chỉ</th>
							<th>Email</th>
							<th>Điện thoại</th>
							<th></th>
						</tr>
					</thead>					
					<tbody>
						<?php $stt = 0;?>
						<?php foreach($contacts as $item): ?>
						<?php $stt = $stt + 1;?>
						<tr>
							<td><?php echo $stt; ?></td>
							<td><?php echo $item['name']; ?></td>
							<td><?php echo $item['address']; ?> </td>
							<td><?php echo $item['email']; ?></td>
							<td><?php echo $item['phone']; ?> </td>
							<td>
								<a title="Xem" data-toggle="modal" data-target="#<?php echo $item['id']; ?>" href="#"><i class="fa fa-dropbox fa-2x" aria-hidden="true"></i></a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table> 
			</div>
			<?php foreach($contacts as $item): ?>
			<div id="<?php echo $item['id']; ?>" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<span class="modal-title">Content</span>
						</div>
						<div class="modal-body">
							<p><?php echo $item['content']; ?> </p>
						</div>
						<div class="modal-footer">
							<a href="" type="button" class="btn btn-default">Đồng ý</a>
							<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<!--//graph-visual-->
</div>
<!--//outer-wp-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>