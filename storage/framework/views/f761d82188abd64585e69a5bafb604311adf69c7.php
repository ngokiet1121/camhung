<?php $__env->startSection('content'); ?>
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
		<h2>Đăt hàng thành công, vui lòng kiểm tra lại email để kiêm tra lại thông tin đơn hàng</br>Nhân viên bên chúng tôi sẽ liên lạc với bạn để xác nhận.</h2>
	</div>
	<center> Hệ thống sẽ chuyển về Tranh chính sau 10s.
            <div id="countdown">10</div></center>
            <script type="text/javascript">
                    var seconds;
                    var temp;

                    function countdown() {
                        seconds = document.getElementById('countdown').innerHTML;
                        seconds = parseInt(seconds, 10);

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
                        window.location = "<?php echo e(asset('/')); ?>";
                    }
                    setTimeout('forward()', 10000);
                </script>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>