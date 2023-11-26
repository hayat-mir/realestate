<!-- !-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Admin</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('index.php/admin/home/index'); ?>">Admin</a></li>
						<li class="breadcrumb-item active">Property Detail</li>

					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<?php // print_r($result); 
	?>
	<section class="content">
		<div class="container-fluid">
			<!-- head -->
			<div class="bg-white shadow-sm p-3 mb-5 bg-white rounded">
				<div class=" d-flex justify-content-between">
					<h3 class="ml-3 mt-2"> <strong><i><?php echo $result->p_title; ?></i></strong></h3>
					<h3 class="mt-3 mr-3"><?php $fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY);
																echo $fmt->formatCurrency($result->p_price, "INR"); ?></h3>
				</div>
				<div class="d-flex ml-3 justify-content-between">
					<div class="d-flex">
						<?php
						foreach ($status as $value) {
							if ($value['status_id'] == $result->p_status) {
						?>
								<h5><span class="badge badge-primary mr-2"><?php echo $value['status_name'] ?></span></h5>
						<?php	}
						}
						?>
						<?php
						foreach ($type as $value) {
							if ($value['type_id'] == $result->p_type) {
						?>
								<h5><span class="badge badge-danger mr-2"><?php echo $value['type_name'] ?></span></h5>
						<?php	}
						}
						?>
						<?php
						foreach ($label as $value) {
							if ($value['label_id'] == $result->p_label) {
						?>
								<h5><span class="badge badge-success mr-2"><?php echo $value['label_name'] ?></span></h5>
						<?php	}
						}
						?>
					</div>
					<div class="mr-4">
						<a href="<?php echo base_url(); ?>index.php/admin/property/edit?id=<?php echo $result->p_id; ?>">
							<button type="button p-5" class="btn btn-info"><i class="fa-solid fa-pen-to-square mr-3"></i>Edit</button>
						</a>
					</div>
				</div>
				<div>
					<?php
					// Home::getCountry($result->p_country);
					?>
					<script src="<?php echo base_url(); ?>vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>

					<!-- Bootstrap 4 -->
					<script src="<?php echo base_url(); ?>vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
					<script>
						$.ajax({
							url: "<?= site_url("index.php/Home/getCountry") ?>",
							type: "post", // To protect sensitive data
							data: {
								ajax: true,
								variableX: "string",
								variableY: 25
								//and any other variables you want to pass via POST
							},
							success: function(response) {
								alert('hello');
								// Handle the response object
							}
						});
					</script>
					<p class="text-secondary font-weight-bold ml-3"> <i class="fa-solid fa-location-dot mr-2"></i><?php echo $country . ", " . $state . ", " . $city . ", " . $result->p_address; ?>
					</p>
					<hr>
				</div>
				<!-- image Caserol -->
				<div class="m-5 ">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">

							<?php
							$i = 1;
							foreach ($images as $value) {
								$path = base_url() . $value['img_file_path'];
								if ($i == 1) {

							?>
									<div class="carousel-item active">
										<img src="<?php echo $path; ?>" class="d-block w-100" alt="property image">
									</div>

								<?php $i--;
								} else {
								?>

									<div class="carousel-item">
										<img src="<?php echo $path; ?>" class="d-block w-100" alt="property image">
									</div>

								<?php } ?>
							<?php } ?>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- Description -->
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card border-top border-warning">
					<div div class="card-header bg-danger">
						<h3 class="card-title">Description</h3>
					</div>
					<div class="card-body">
						<?php if ($result->p_content != null) {
							echo $result->p_content;
						} else {
							echo 'NO description Available!';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Address Details -->
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card border-top border-warning">
					<div div class="card-header bg-primary">
						<h3 class="card-title">Address Details</h3>
					</div>
					<div class="card-body">
						<!-- row 1 -->
						<div class="row mb-3">
							<div class="col-6 col-sm-3">
								<h6><strong>Country</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<?php echo $country; ?>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<h6><strong>Pincode</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-right">
								<?php echo $result->p_postal_code; ?>
							</div>
						</div>
						<!--row 2  -->
						<div class="row mb-3">
							<div class="col-6 col-sm-3">
								<h6><strong>State</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<?php echo $state; ?>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<h6><strong>Address</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-right">
								<?php echo $result->p_address; ?>
							</div>
						</div>
						<!-- row 3 -->
						<div class="row ">
							<div class="col-6 col-sm-3">
								<h6><strong>City</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<?php echo $city; ?>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Other Details -->
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card border-top border-warning">
					<div div class="card-header bg-info">
						<h3 class="card-title">Other Details</h3>
					</div>
					<div class="card-body">
						<!-- row 1 bedrooms,bathrooms-->
						<div class="row mb-3">
							<div class="col-6 col-sm-3 ">
								<h6><strong>Bedrooms</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<?php echo $result->p_bedrooms; ?>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<h6><strong>washrooms</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-right">
								<?php echo $result->p_bathrooms; ?>
							</div>
						</div>
						<!--row 2  area size,land area-->
						<div class="row mb-3">
							<div class="col-6 col-sm-3 ">
								<h6><strong>Area Size</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<?php echo $result->p_area; ?>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<h6><strong>Area Unit</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-right">
								<?php echo $result->p_area_unit; ?>
							</div>
						</div>
						<!-- row 3 land area postfix,garage-->
						<div class="row mb-3">
							<div class="col-6 col-sm-3 ">
								<h6><strong>Land Area</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<?php echo $result->p_land; ?>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<h6><strong>Land Area Unit</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-right">
								<?php echo $result->p_land_unit; ?>
							</div>
						</div>
						<!-- row 4 garage size ,year-->
						<div class="row mb-3">
							<div class="col-6 col-sm-3 ">
								<h6><strong>Garage</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<?php echo $result->p_garage; ?>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<h6><strong>Garage Size</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-right">
								<?php echo $result->p_garages_unit; ?>
							</div>
						</div>
						<!-- row 5 front facing-->
						<div class="row ">
							<div class="col-6 col-sm-3 ">
								<h6><strong>Front Facing</strong></h6>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<?php echo $property_facing; ?>
							</div>
							<div class="col-6 col-sm-3 text-sm-left">
								<b>Year Built</b>
							</div>
							<div class="col-6 col-sm-3  text-sm-right">
								<?php echo $result->p_year; ?>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--private note  -->
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card border-top border-warning">
					<div div class="card-header bg-success">
						<h3 class="card-title">Private Note</h3>
					</div>
					<div class="card-body">
						<?php if ($result->p_private_note == null) {

							echo 'No Private Note Available!';
						} else {
							echo $result->p_private_note;
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>