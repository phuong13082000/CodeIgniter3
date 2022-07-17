<body>
<header id="header"><!--header-->
	<div class="header_top"><!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-phone"></i> Phone</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> Email</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header_top-->

	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<a href="/"><img src="<?php echo base_url('./frontend/images/home/logo.png') ?>" alt=""/></a>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<?php if ($this->session->userdata('LoggedInCustomer')) { ?>
								<li><a href="/tai-khoan"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="/wishlist"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="<?php echo base_url('/order-cart') ?>"><i class="fa fa-crosshairs"></i>Checkout</a></li>
								<li><a href="<?php echo base_url('/dang-xuat') ?>"><i class="fa fa-lock"></i> Logout</a></li>
							<?php } else { ?>
								<li><a href="<?php echo base_url('/dang-nhap') ?>"><i class="fa fa-lock"></i> Login</a></li>
							<?php } ?>
							<li><a href="<?php echo base_url('/gio-hang') ?>"><i class="fa fa-shopping-cart"></i>Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->

	<div class="header-bottom"><!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="mainmenu pull-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="<?php echo base_url('/') ?>" class="active">Home</a></li>
							<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
									<?php
									foreach ($category as $key => $cate) {
										?>
										<li>
											<a href="<?php echo base_url('danh-muc/' . $cate->id) ?>"><?php echo $cate->title ?></a>
										</li>
										<?php
									}
									?>
								</ul>
							</li>
							<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
									<li><a href="/blog">Blog List</a></li>
									<li><a href="/blog-single">Blog Single</a></li>
								</ul>
							</li>
							<li><a href="/error">404</a></li>
							<li><a href="/contact-us">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="search_box pull-right">
						<input type="text" placeholder="Search"/>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-bottom-->
</header><!--/header-->
