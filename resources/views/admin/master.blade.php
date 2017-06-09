<!DOCTYPE HTML>
<html>
<head>
	@include('admin.includes.head')
</head> 
<body>
<?php
	$admin = Auth::guard('admin')->user();
?>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<div class="header-section">
					<!--menu-right-->
					@include('admin.includes.top_menu')
					<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="col-lg-12">
					@if(Session::has('flash_message'))
					<div class="alert alert-success" >
						<strong>Hoàn tất! </strong>{!! Session::get('flash_message') !!}
					</div>
					@endif
					<script type="text/javascript">
						$("div.col-lg-12").delay(3000).slideUp();
					</script>
				</div>
				<div class="col-lg-12">
					@if(Session::has('err_message'))
					<div class="alert alert-danger" >
						<strong>Lỗi! </strong>{!! Session::get('err_message') !!}
					</div>
					@endif
					<script type="text/javascript">
						$("div.col-lg-12").delay(3000).slideUp();
					</script>
				</div>
                                <div class="col-lg-12">
						@if(count($errors)>0)
						<div class="alert alert-danger" >
							<ul>
								@foreach($errors->all() as $error)
								<li><strong>Lỗi! </strong>{!! $error !!}</li>
								@endforeach
							</ul>
						</div>
						@endif
					</div>
				@yield('content')

				<!--//outer-wp-->
				<!--footer section start-->
				<footer>
					<p>&copy 2016 Augment . All Rights Reserved | Design by <a href="#" target="_blank">TKV.Team</a></p>
				</footer>
				<!--footer section end-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->

		<!--/down-->
		@include('admin.includes.adminface')
		<!--//down-->
		@include('admin.includes.menu')
	</div>
	<div class="clearfix"></div>		
</div>


@include('admin.includes.script')
</body>
</html>