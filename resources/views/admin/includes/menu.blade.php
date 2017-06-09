<div class="menu">
	<ul id="menu" >
		<li><a href="{{ route('admin.home.getIndex') }}"><i class="fa fa-tachometer"></i> <span>Trang Chính</span></a></li>

		<li id="menu-academico" ><a href="#"><i class="fa fa-product-hunt"></i> <span>Sản Phẩm</span> <span class="fa fa-angle-right" style="float: right"></span></a>
			<ul id="menu-academico-sub" >
				<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.product.getListmenu') }}">Loại Sản Phẩm</a></li>
				<li id="menu-academico-boletim" ><a href="{{ route('admin.product.getListproduct') }}">Sản Phẩm</a></li>
			</ul>
		</li>
		<li id="menu-academico" ><a href="#"><i class="fa fa-newspaper-o"></i> <span>Bài Viết</span> <span class="fa fa-angle-right" style="float: right"></span></a>
			<ul id="menu-academico-sub" >
				<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.article.getListmenu') }}">Loại Bài Viết</a></li>
				<li id="menu-academico-boletim" ><a href="{{ route('admin.article.getListarticle') }}">Bài Viết</a></li>
			</ul>
		</li>

		<li><a href="{{ route('admin.gallery.getList') }}"><i class="fa fa-file-image-o"></i> <span>Hình Ảnh</span></a></li>
		<li><a href="{{ route('admin.order.getList') }}"><i class="fa fa-folder"></i> <span>Đơn Hàng</span></a></li>
		<li><a href="{{ route('admin.contact.getList') }}"><i class="fa fa-phone"></i> <span>Liên Hệ</span></a></li>
		
		@if ($admin['role_id'] == 1)
			<li><a href="{{ route('admin.information.getEdit') }}"><i class="fa fa-info-circle"></i> <span>Thông Tin</span></a></li>
			<li><a href="{{ route('admin.staff.getList') }}"><i class="lnr lnr-user"></i> <span>Nhân Viên</span></a></li>	
		@endif
	</ul>
</div>