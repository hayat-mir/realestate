<!-- ********************* Upper Header with Logo *********************** -->
<div class="container-fluid">
	<div class="row upper-header">
		<div class="logo-container-wrap">
			<div class="logo-inner">
				<a href="<?php echo base_url('index.php/front'); ?>"><img class="logo-img" src="<?php echo base_url() . $setting->logo ?>" alt="logo not found" /> </a>
			</div>
		</div>

		<div class="header-contact-details-wrap">
			<div class="icon-with-details">
				<span class="icon"><i class="fa-solid fa-phone"></i></span>
				<div class="inner-contact-details">
					<span class="inner-heading"> +91 <?php echo $setting->phone ?></span>
					<span class="inner-subheading"> <?php echo $setting->email ?> </span>
				</div>
			</div>

			<div class="icon-with-details">
				<span class="icon"><i class="fa-solid fa-location-dot"></i></span>
				<div class="inner-contact-details">
					<span class="inner-heading"><?php echo $setting->footer_text_right ?></span>
					<span class="inner-subheading"> <?php echo $setting->description . ',' . $setting->city ?></span>
				</div>
			</div>

			<div class="icon-with-details">
				<span class="icon"><i class="fa-solid fa-clock"></i></span>
				<div class="inner-contact-details">
					<span class="inner-heading"> Available For You </span>
					<span class="inner-subheading"> Monday to Saturday</span>
				</div>
			</div>

			<div class="header-social-icons">
				<!-- <span class="social-icons"><i class="fa-brands fa-facebook"></i></span> -->
				<a href="https://www.facebook.com" target="_blank" class="social-icons">
    <i class="fa-brands fa-facebook"></i>
</a>
<a href="https://www.instagram.com" target="_blank" class="social-icons">
    <i class="fa-brands fa-instagram""></i>
</a>

				<!-- <span class="social-icons"><i class="fa-brands fa-instagram"></i></span> -->
			</div>
		</div>

	</div>
</div>
<!-- ******************** Upper Header End ***************************** -->

<!-- ******************** Navbar Start ***************************** -->
<div class="lower-header">
	<nav class="navbar navbar-expand-lg navbar-dark ">
		<!-- <a class="navbar-brand" href="#">Home</a> -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- ************** LOGO and Login Icon: Display on Tab and Mobile **************** -->

		<span class="logo-mobile display-on-mobile">H.O.M.E.S.P.H.E.R.E</span>
		<span class="login-icon-mobile display-on-mobile"><a href="<?php echo base_url('index.php/Login'); ?>"><i class="fa-solid fa-user" title="<?php $this->session->userdata('fullname'); ?>"></i></a></span>

		<!-- ******************** End Login Icon  ********************************* -->

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/front'); ?>">Home</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Properties
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url('index.php/front/property_grids'); ?>">All Properties</a>
						<a class="dropdown-item" href="<?php echo base_url('index.php/front/'); ?>#propertysalesid">Properties on Sale</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/front/about'); ?>">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="<?php echo base_url('index.php/front/contactUs'); ?>">Contact</a>
				</li>
			</ul>

			<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('index.php/front/'); ?>#searchSection"><i class="fa-solid fa-magnifying-glass mr-1"></i>Search</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('index.php/front/'); ?>#welcomeSection">Why Us?</a>
			</li>
				</ul>

			<!-- login -->
			<?php if (!$this->session->userdata('isLogIn')) { ?>
				<a href="<?php echo base_url('index.php/login'); ?>"><button class="btn btn-info btn-sm ml-2" title="Please Login">LogIn</button></a>
			<?php } ?>
			<!-- logout -->
			<?php if ($this->session->userdata('isLogIn')) { ?>
				<a href="<?php echo base_url('index.php/logout'); ?>"><button class="btn btn-info btn-sm ml-2" title="<?php echo $this->session->userdata('fullname'); ?>">Logout</button></a>

			<?php } ?>

		</div>
	</nav>
</div>
<!-- ******************** Navbar End ******************************* -->