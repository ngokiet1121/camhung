<div class="sidebar-menu">
	<header class="logo">
		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="{!! asset('admin/home/dashboard') !!}"> <span id="logo"> <h1>Admin</h1></span> 
		<!--<img id="logo" src="" alt="Logo"/>--> 
	</a> 
</header>
<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>



<div class="down">	
	<a href="#"><img src="{{ asset('') }}/{{ $admin['img'] }}" atl="{{ $admin['name'] }}"></a>
	<a href="#"><span class=" name-caret">{{ $admin['name'] }}</span></a>
	<p>Quản trị hệ thống</p>
	<ul>
		
		<li><a class="tooltips" href="{!! URL::route('admin.infoadmin.getInfo')!!}"><span>Tài khoản</span><i class="lnr lnr-user"></i></a></li>
		<li><a class="tooltips" href="{{ URL::route('admin.infoadmin.getChangePass') }}"><span>Đổi mật khẩu</span><i class="lnr lnr-cog"></i></a></li>
		<li><a class="tooltips" href="{{ route('admin.getLogout') }}"><span>Đăng xuất</span><i class="lnr lnr-power-switch"></i></a></li>
	</ul>
</div>
