<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | <?php echo $setting->title ?> </title>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo base_url() . $setting->favicon; ?>" type="image/x-icon">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

	<div class="login-box">
		<?php if ($this->session->flashdata('success') != null) { ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong><?php echo $this->session->flashdata('success'); ?></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php } ?>
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="<?php echo base_url('index.php/login'); ?>" class="h1">
					<img style="width:40%; height:auto;" src="<?php echo base_url() . $setting->logo; ?>" alt="Logo">
				</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Sign in to start your session</p>
				<!-- alert message -->
				<?php if ($this->session->flashdata('message') != null) {  ?>
					<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $this->session->flashdata('message'); ?>
					</div>
				<?php } ?>

				<?php if ($this->session->flashdata('exception') != null) {  ?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $this->session->flashdata('exception'); ?>
					</div>
				<?php } ?>

				<?php if (validation_errors()) {  ?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo validation_errors(); ?>
					</div>
				<?php } ?>

				<?php echo form_open('index.php/login', 'id="loginForm" novalidate'); ?>
				<div class="input-group mb-3">
					<input type="text" placeholder="<?= display('email') ?>" name="email" id="email" class="form-control">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" placeholder="<?= display('password') ?>" name="password" id="password" class="form-control">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>

				<div class="input-group mb-3">
					<select name="user_role" class="form-control" id="user_role">
						<option value="" selected="selected">Select User Role</option>
						<option value="1">Admin</option>
						<option value="2">User</option>
					</select>


					<!-- <div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div> -->
				</div>

				<div class="row">
					<div class="col-4 offset-4">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-12">
						<p class="text-center">
							<strong>
								If Not A User Please <a href="<?php echo base_url('index.php/Login/register'); ?>">REGISTER</a> Here</strong>
						</p>
					</div>
				</div>
				</form>

				<!-- <div class="social-auth-links text-center mt-2 mb-3">
					<a href="#" class="btn btn-block btn-primary">
						<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
					</a>
					<a href="#" class="btn btn-block btn-danger">
						<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
					</a>
				</div> -->
				<!-- /.social-auth-links -->

				<!-- <p class="mb-1">
					<a href="forgot-password.html">I forgot my password</a>
				</p>
				<p class="mb-0">
					<a href="register.html" class="text-center">Register a new membership</a>
				</p> -->
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>dist/js/adminlte.min.js"></script>
</body>

</html>