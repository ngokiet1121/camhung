<div class="footer">

	<div class="item-footer">
	@foreach ($information as $info)
		<h3>{{ $info['name'] }}</h3>
		<h4>Địa Chỉ : {{ $info['address'] }}</h4>
		<h4>Điện Thọai : {{ $info['phone'] }}</h4>
		<h4>Fax : {{ $info['fax'] }}</h4>
		<h4>Email : {{ $info['email'] }}</h4>
		<h4>Website: {{ $info['link'] }}</h4>
	@endforeach
		

	</div>

	<div class="item-footer">
		<h3>Hỗ Trợ Khách Hàng</h3>
		<h4>Hướng Dẫn Mua Hàng</h4>
		<h4>Giao Hàng Lắp Đặt</h4>
		<h4>Bảo Hành Đổi Trả</h4>
		<h4>Liên Hệ - Góp Ý</h4>
		<h4>Website: http://camhungstore.com</h4>
	</div>

	<div class="item-footer">
		<iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/CamHungCompany/&tabs=timeline&width=320px&height=400px&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="320px" height="320px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	</div>
</div>