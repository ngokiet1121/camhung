
@extends('admin.master')
<!--outter-wp-->
@section('content')
<div class="outter-wp">
    <div class="col-lg-12">
        <div class="alert alert-danger" >
            <center><strong>LỖI! </strong>SAI ĐƯỜNG DẪN TRANG</br> Hệ thống sẽ chuyển về Tranh chính sau 5s.
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
                        window.location = "{{ asset('')}}/admin/home/dashboard";
                    }
                    setTimeout('forward()', 7000);
                </script>
        </div>
    </div>
</div>
@endsection()