<h1>Cảm ơn bạn đã đặt hàng tại Cẩm Hưng Store</h1>
<br/>
<h3>Thông tin đặt hàng của bạn</h3>

<div class="item-footer">
	<h4>Tên Khách Hàng : {{ $name }}</h4>
	<h4>Email : {{ $email }}</h4>
	<h4>Điện Thọai : {{ $phone }}</h4>
	<h4>Address: {{ $address }}</h4>
</div>

<?php 
$products = DB::table('orderdetail')->where('order_id',$order_id)->get();
?>
<table style="text-align: center;
	width: 100%;
	border-collapse: separate;
	border-radius: 5px;
	border: 1px solid #e5e5e5">
	<thead>
		<tr>
			<th style="padding: 20px 10px;border: 1px solid #e5e5e5;font-size: 18px;">Tên Sản Phẩm</th>
			<th style="padding: 20px 10px;border: 1px solid #e5e5e5;font-size: 18px;">Giá</th>
			<th style="padding: 20px 10px;border: 1px solid #e5e5e5;font-size: 18px;">Số Lượng</th>
			<th style="padding: 20px 10px;border: 1px solid #e5e5e5;font-size: 18px;">Tổng Cộng</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($products as $product) {
			?>
		<tr>
			<td style="padding: 20px 10px;border: 1px solid #e5e5e5"><p><?php echo $product->name; ?> </p></td>
			<td style="padding: 20px 10px;border: 1px solid #e5e5e5"><?php echo $product->price/$product->quantity; ?></td>
			<td style="padding: 20px 10px;border: 1px solid #e5e5e5"><?php echo $product->quantity; ?></td>
			<td style="padding: 20px 10px;border: 1px solid #e5e5e5"><?php echo $product->price; ?></td>
		</tr>
			<?php
		}
		?>
		<tr >
			<td colspan="5">
				<h3 style="padding: 0;
				margin: 0;
				color:#f96332;">Tạm Tính : {{ $totalPrice }} VNĐ</h3>
			</td>
		</tr>
	</tbody>
</table>

<h2>Lưu Ý: Vui lòng kiểm tra lại thông tin đặt hàng của bạn, nếu có gì sai sót vui lòng liên hệ với chúng tôi theo thông tin dưới đây.</h2>


<hr>
<div class="item-footer">
	<h3>Thông tin công ty</h3>
	@foreach ($information as $info)
		<h4>{{ $info['name'] }}</h4>
		<h4>Điện Thọai : {{ $info['phone'] }}</h4>
		<h4>Email : {{ $info['email'] }}</h4>
		<h4>Website: {{ $info['link'] }}</h4>
	@endforeach
</div>