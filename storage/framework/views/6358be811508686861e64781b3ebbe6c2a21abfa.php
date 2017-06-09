<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js' type='text/javascript'></script>
<script type='text/javascript'>
	$(function() {
		$(window).scroll(function() {
			if ($(this).scrollTop() != 0) {
				$('#bt-top').fadeIn();

			} else {
				$('#bt-top').fadeOut();
			}
		});
		$('#bt-top').click(function() {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
		});
	});
	$(function() {
		$(window).scroll(function() {
			if ($(this).scrollTop() >= 300) {
				$(".nav-menu-scroll").addClass("nav-menu-in"); 
			} else {
				$(".nav-menu-scroll").removeClass("nav-menu-in"); 
			}
		});
	});
</script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="<?php echo e(asset('public/frontend/js/slick.js')); ?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(document).on('ready', function() {
		$('.single-item-rtl').slick({
			dots: false,
			infinite: true,
			autoplay:true
		});
	});
</script>	
<script>
	var toggle = true;

	$(".icon-click-menu").click(function() {                
		if (toggle)
		{
			$(".nav-menu").addClass("open-list-product").removeClass("close-list-product"); 
			$("#wrapper").addClass("wrapper-out").removeClass("wrapper-in");
			$(".change-icon").removeClass("fa-bars").addClass("fa-times");    
		}
		else
		{
			$(".nav-menu").removeClass("open-list-product").addClass("close-list-product"); 
			$("#wrapper").addClass("wrapper-in").removeClass("wrapper-out");
			$(".change-icon").addClass("fa-bars").removeClass("fa-times"); 
		}

		toggle = !toggle;
	});
</script>
<script>
	var toggle = true;

	$(".click-cart").click(function() {                
		if (toggle)
		{
			$(".nav-cart-scroll").addClass("nav-cart-in");
		}
		else
		{
			$(".nav-cart-scroll").removeClass("nav-cart-in"); 
		}

		toggle = !toggle;
	});
</script>
<!--	dong ho -->

<script type="text/javascript">
	$(document).ready(function() {
			// Tao 2 mang chua ten ngay thang
			var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
			var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

			// Tao moi doi tuong Date()
			var newDate = new Date();
			// Lay gia tri thoi gian hien tai
			newDate.setDate(newDate.getDate());
			// Xuat ngay thang, nam
			$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

			setInterval( function() {
			    // lay gia tri giay trong doi tuong Date()
			    var seconds = new Date().getSeconds();
			    // Chen so 0 vao dang truoc gia tri giay
			    $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
			},1000);

			setInterval( function() {
			    // Tuong tu lay gia tri phut
			    var minutes = new Date().getMinutes();
			    // Chen so 0 vao dang truoc gia tri phut neu gia tri hien tai nho hon 10
			    $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
			},1000);

			setInterval( function() {
			    // Lay gia tri gio hien tai
			    var hours = new Date().getHours();
			    // Chen so 0 vao truoc gia tri gio neu gia tri nho hon 10
			    $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
			}, 1000);
		});
	</script>
	
	<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
			showDivs(slideIndex += n);
		}

		function currentDiv(n) {
			showDivs(slideIndex = n);
		}

		function showDivs(n) {
			var i;
			var x = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("demo");
			if (n > x.length) {slideIndex = 1}
				if (n < 1) {slideIndex = x.length}
					for (i = 0; i < x.length; i++) {
						x[i].style.display = "none";
					}
					for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
					}
					x[slideIndex-1].style.display = "block";
					dots[slideIndex-1].className += " w3-opacity-off";
				}
			</script>

	<script type="text/javascript" src="<?php echo e(asset('public/frontend/javascripts/vendor/jquery.tabslet.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/frontend/javascripts/vendor/rainbow-custom.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/frontend/javascripts/vendor/jquery.anchor.js')); ?>"></script>
	<script src="<?php echo e(asset('public/frontend/javascripts/initializers.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/jquery.auto-complete.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/jquery.auto-complete.min.js')); ?>"></script>

<?php 
	$search_products = DB::table('products')->get();
	$name = "";
?>
<?php foreach($search_products as $search_product): ?>
	<?php $name = "'$search_product->name',$name"; ?>
	
<?php endforeach; ?>

<script>
        $(function(){
            $('#hero-demo').autoComplete({
                minChars: 1,
                source: function(term, suggest){
                    term = term.toLowerCase();
                    var choices = [<?php echo $name; ?>];
                    var suggestions = [];
                    for (i=0;i<choices.length;i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
                }
            });  
        });   
</script>