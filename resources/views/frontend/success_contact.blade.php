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
		<h2>Chúng tôi đã nhận được liên hệ của bạn.</h2>
	</div>
	<center> Hệ thống sẽ chuyển về Tranh chính sau 5s.
            <div id="countdown">10</div></center>
            <script type="text/javascript">
                    var seconds;
                    var temp;

                    function countdown() {
                        seconds = document.getElementById('countdown').innerHTML;
                        seconds = parseInt(seconds, 5);

                        if (seconds == 1) {
                            temp = document.getElementById('countdown');
                            temp.innerHTML = "Đang chuyển trang...";
                            return;
                        }

                        seconds--;
                        temp = document.getElementById('countdown');
                        temp.innerHTML = seconds;
                        timeoutMyOswego = setTimeout(countdown, 1000);
                    }
                    countdown();
                    function forward() {
                        window.location = "{{ asset('/')}}";
                    }
                    setTimeout('forward()', 5000);
                </script>

</div>
@endsection()