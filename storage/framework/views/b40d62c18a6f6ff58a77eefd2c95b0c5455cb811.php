<!--outter-wp-->
<?php $__env->startSection('content'); ?>

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="<?php echo e(route('admin.home.getIndex')); ?>">Home</a></li>
			<li class="active">Ảnh</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h3 class="inner-tittle two">Danh sách hình ảnh</h3>
			<h4>
			<a href="<?php echo URL::route('admin.gallery.getAdd'); ?>" type="button" class="btn btn-default">
				<i class="fa fa-plus" aria-hidden="true"></i> Thêm mới hình ảnh</a>
			</h4>
		<div class="graph">
			<div class="data-table">
				<table id="list-table" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Ảnh</th>
							<th>Mục ảnh</th>
							<th></th>
						</tr>
					</thead>					
					<tbody>
						<?php $stt = 0;?>
						<?php foreach($galleries as $item): ?>
						<?php $stt = $stt + 1;?>
						<tr>
							<td><?php echo $stt; ?></td>
							<td><img height="100px" src="<?php echo e(asset('')); ?>/<?php echo $item['img']; ?>" alt="<?php echo $item['img_note']; ?>"></td>
							<td><?php echo $item['parent']; ?> </td>
							<td>
								<a href="<?php echo URL::route('admin.gallery.getEdit',$item['id']); ?>" title="Sửa"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></a>
								<a title="Xóa" data-toggle="modal" data-target="#<?php echo $item['id']; ?>2" href="#"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table> 
			</div>
			<?php foreach($galleries as $item): ?>
			<div id="<?php echo $item['id']; ?>" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<span class="modal-title"><?php echo $item['content']; ?></span>
						</div>
						<div class="modal-body">
							<img src="<?php echo e(asset('')); ?><?php echo $item['img']; ?>" alt="<?php echo $item['img_note']; ?>">
						</div>
						<div class="modal-footer">
							<a href="" type="button" class="btn btn-default">Đồng ý</a>
							<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
			<?php foreach($galleries as $item): ?>
			<div id="<?php echo $item['id']; ?>2" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<span class="modal-title">Xóa hình ảnh</span>
						</div>
						<div class="modal-body">
							<p>Bạn có chắc muốn xóa dự liệu này?</p>
						</div>
						<div class="modal-footer">
							<a href="<?php echo URL::route('admin.gallery.getDelete',$item['id']); ?>" type="button" class="btn btn-default">Đồng ý</a>
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
<!--//outer-wp-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>