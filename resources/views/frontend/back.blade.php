@extends('frontend.master')
@section('content')
<style>
	.nav-show-hid{
		display: none;
	}
	.contact-ship{
		display: none;
	}
</style>
<div class="content back-pay ">
	
    <div class="title-cart">
        <h2>LIÊN HỆ</h2>
    </div>
    <div class="pay-order">
        <div class="pay-order-left">
            
            <div class="inf-customer">
                <h3>THÔNG TIN KHÁCH HÀNG</h3>
                <form action="{{ route('contact') }} " method="POST" class="form-customer">
                    {{ csrf_field() }}
                    <div class="short-input fix-right" >
                        <input type="text" name="name" placeholder="Họ Và Tên Của Bạn" value="">
                    </div>
                    <div class="short-input">
                        <input type="text" name="phone" placeholder="Số Điện Thoại" value="">
                    </div>
                    <div class="long-input">
                        <input type="text" name="email" placeholder="Email" value="">
                    </div>
                    <div class="long-input">
                        <input type="text" name="address" placeholder="Số Nhà, Tên Đường, Phường/Xã" value="">
                    </div>
                    <div class="text-note">
                        <p>Yêu cầu của khách hàng</p>
                    </div>
                    <div class="long-input">
                        <input type="text" name="content"  placeholder="Yêu Cầu"  style="height: 100px; padding-top: 0;" >
                    </div>
                    <div class="buy-button">
                        <input type="submit" value="Đặt Mua" />
                    </div>
                    @if(count($errors)>0)
                        <div style="color: #a94442; background-color: #f2dede; border-color: #ebccd1;">
                            <ul style="margin-top: 10px; padding-top: 10px; padding-bottom: 10px;">
                                @foreach($errors->all() as $error)
                                <li><strong>LỖI! </strong>{!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <div class="pay-order-right">
            <div class="inf-customer">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10853.64627888674!2d108.24269552609756!3d15.89106829836837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31420f9a65de2327%3A0xafc2b9077f5c4686!2zVsSpbmggxJBp4buHbiwgVHAuIEjhu5lpIEFuLCBRdeG6o25nIE5hbSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1494247421538" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                
            </div>
        </div>
</div>
@endsection()