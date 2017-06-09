<title>Trang Quản Trị</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{ asset('public/frontend/img/cart-icon.ico')}}" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('public/admin/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{ asset('public/admin/css/style.css') }}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{ asset('public/admin/css/font-awesome.css') }}" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="{{ asset('public/admin/css/icon-font.min.css') }}" type='text/css' />
<!-- /js -->
<script src="{{ asset('public/admin/js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('editor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.dataTables.min.js') }}"></script>
{{--  --}}
<script>
	$(document).ready(function() {
		$('#list-table').DataTable(
		{
			"aoColumnDefs": [
			{ 
				"bSortable": false, 
				  "aTargets": [ -1 ] // <-- gets last column and turns off sorting
				} 
				]
			});
	} );
</script>

