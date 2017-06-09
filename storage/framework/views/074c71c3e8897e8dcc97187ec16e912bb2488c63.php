<div class="top_menu" style="display: none">
	<script type="text/javascript">
		$('.main-search').hide();
		$('button').click(function (){
			$('.main-search').show();
			$('.main-search text').focus();
		}
		);
		$('.close').click(function(){
			$('.main-search').hide();
		});
	</script>
	<!--/profile_details-->
	<div class="profile_details_left">
		<ul class="nofitications-dropdown">
			<li class="dropdown note dra-down">
				<div id="dd" class="wrapper-dropdown-3" tabindex="1">
					<span>VI</span>
					<ul class="dropdown">
						<li><a class="deutsch">EN</a></li>
					</ul>
				</div>
				<script type="text/javascript">

					function DropDown(el) {
						this.dd = el;
						this.placeholder = this.dd.children('span');
						this.opts = this.dd.find('ul.dropdown > li');
						this.val = '';
						this.index = -1;
						this.initEvents();
					}
					DropDown.prototype = {
						initEvents : function() {
							var obj = this;

							obj.dd.on('click', function(event){
								$(this).toggleClass('active');
								return false;
							});

							obj.opts.on('click',function(){
								var opt = $(this);
								obj.val = opt.text();
								obj.index = opt.index();
								obj.placeholder.text(obj.val);
							});
						},
						getValue : function() {
							return this.val;
						},
						getIndex : function() {
							return this.index;
						}
					}

					$(function() {

						var dd = new DropDown( $('#dd') );

						$(document).click(function() {
						// all dropdowns	
						$('.wrapper-dropdown-3').removeClass('active');
					});

					});

				</script>

			</li>

			<li class="dropdown note">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope-o"></i> <span class="badge">
					<?php 
					$data = DB::table('contacts')->where('is_active',0)->get();
					print_r(count($data)); 
					?>
				</span></a>

				<ul class="dropdown-menu two first">
					<li>
						<div class="notification_header">
							<h3>You have <?php print_r(count($data)); ?> new messages  </h3> 
							</div>
						</li>
						<?php 
						foreach ($data as $val) {
							?>

							<li><a href="<?php echo URL::route('admin.contact.getList'); ?>" >
								<div class="notification_desc">
									<p><?php print_r($val->email); ?></p>
									<p><span>1 hour ago</span></p>
								</div>
								<div class="clearfix"></div>	
							</a>
							<?php		
						}
						?>
					</li>
					<li>
						<div class="notification_bottom">
							<a href="<?php echo URL::route('admin.contact.getList'); ?>">See all messages</a>
						</div> 
					</li>
				</ul>
			</li>
			
			<li class="dropdown note">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i> <span class="badge">
				<?php 
					$data = DB::table('orders')->where('status',1)->get();
					print_r(count($data)); 
				?>
				</span></a>

				<ul class="dropdown-menu two">
					<li>
						<div class="notification_header">
							<h3>You have <?php print_r(count($data)); ?> new notification</h3>
						</div>
					</li>
					<?php 
						foreach ($data as $val) {
							?>

							<li><a href="<?php echo URL::route('admin.order.getList'); ?>" >
								<div class="notification_desc">
									<p><?php print_r($val->email); ?></p>
									
								</div>
								<div class="clearfix"></div>	
							</a>
							<?php		
						}
						?>
					<li>
						<div class="notification_bottom">
							<a href="<?php echo URL::route('admin.order.getList'); ?>">See all notification</a>
						</div> 
					</li>
				</ul>
			</li>	

			<div class="clearfix"></div>	
		</ul>
	</div>
	<div class="clearfix"></div>	
	<!--//profile_details-->
</div>
