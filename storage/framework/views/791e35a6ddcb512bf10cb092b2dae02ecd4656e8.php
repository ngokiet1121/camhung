<div class="sidebar-menu">
	<header class="logo">
		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="<?php echo asset('admin/home/dashboard'); ?>"> <span id="logo"> <h1>Admin</h1></span> 
		<!--<img id="logo" src="" alt="Logo"/>--> 
	</a> 
</header>
<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>



<div class="down">	
	<a href="#"><img src="<?php echo e(asset('')); ?>/<?php echo e($admin['img']); ?>" atl="<?php echo e($admin['name']); ?>"></a>
	<a href="#"><span class=" name-caret"><?php echo e($admin['name']); ?></span></a>
	<p>Quản trị hệ thống</p>
	<ul>
		
		<li><a class="tooltips" href="<?php echo URL::route('admin.infoadmin.getInfo'); ?>"><span>Tài khoản</span><i class="lnr lnr-user"></i></a></li>
		<li><a class="tooltips" href="<?php echo e(URL::route('admin.infoadmin.getChangePass')); ?>"><span>Đổi mật khẩu</span><i class="lnr lnr-cog"></i></a></li>
		<li><a class="tooltips" href="<?php echo e(route('admin.getLogout')); ?>"><span>Đăng xuất</span><i class="lnr lnr-power-switch"></i></a></li>
	</ul>
</div>
