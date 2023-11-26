<style>
	.badge-danger {
		background-color: transparent;
		color: red;
	}

	.badge-danger p {
		font-size: 10px;
	}
</style>
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
						<li class="breadcrumb-item active">Edit Property</li>

					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- Content Wrapper. Contains page content -->
	<div class="row ">
		<!-- Save -->
		<div class="col-sm-12">
			<form role="form" action="<?php echo base_url('index.php/'); ?>admin/property/modify?id=<?php echo $result->p_id; ?>" method="post" id="save_property_form">

				<!-- property_title, content, Property type, status, label -->
				<div class="card">
					<div class="card-header bg-danger">
						<h3 class="card-title"><i class="fa fa-plus"></i> Edit Property</h3>
						<div class="card-tools">
							<!-- <span title="3 New Messages" class="badge badge-primary">3</span> -->
							<button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>

					<div class="card-body">


						<!-- property_title, content, Property type, status, label -->
						<div class="row">
							<div class="col-md-12">

								<input type="hidden" name="unique_id" value="PFG3OU9E">

								<!-- property_title -->
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="property_title">Property Title</label> <small class="req text-danger"> *</small>
											<input name="property_title" class="form-control " type="text" placeholder="Property Title" id="property_title" value="<?php echo $result->p_title; ?>">
											<!-- validation errors -->
											<span class="badge badge-danger">
												<?php echo form_error('property_title'); ?>
											</span>
										</div>
									</div>
								</div>

								<!-- content -->
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Description</label>
											<textarea id="summernote" name="content" class="form-control summernote" rows="6" placeholder="Content"><?php echo $result->p_content; ?></textarea>

										</div>
									</div>
								</div>

								<!-- Property type, status, label -->
								<div class="row">
									<!-- type -->
									<div class="col-md-4">
										<div class="form-group">
											<label>Type</label><i class="req text-danger text-danger"> *</i>
											<select name="type" class="form-control" id="type">
												<?php
												if (!empty($type)) {
													foreach ($type as $tp)
														if ($tp['type_id'] == $result->p_type) {
												?>
														<option value="<?php echo $tp['type_id']; ?>" selected="selected"><?php echo $tp['type_name']; ?></option>
													<?php
														} else {
													?>
														<option value="<?php echo $tp['type_id']; ?>"><?php echo $tp['type_name']; ?></option>
												<?php
														}
												}
												?>
											</select>
											<!-- validation errors -->
											<span class="badge badge-danger">
												<?php echo form_error('type'); ?>
											</span>
										</div>
									</div>
									<!-- Status -->
									<div class="col-md-4">
										<div class="form-group">
											<label>Status</label>
											<select name="status" class="form-control" id="status">
												<?php
												if (!empty($status)) {
													foreach ($status as $st)
														if ($st['status_id'] == $result->p_status) {
												?>
														<option value="<?php echo $st['status_id']; ?>" selected="selected"><?php echo $st['status_name']; ?></option>
													<?php
														} else {
													?>
														<option value="<?php echo $st['status_id']; ?>"><?php echo $st['status_name']; ?></option>
												<?php
														}
												}
												?>
											</select>
										</div>
									</div>
									<!-- label -->
									<div class="col-md-4">
										<div class="form-group">
											<label>Label</label>
											<select name="label" class="form-control" id="label">
												<?php
												if (!empty($label)) {
													foreach ($label as $lb)
														if ($lb['label_id'] == $result->p_label) {
												?>
														<option value="<?php echo $lb['label_id']; ?>" selected="selected"><?php echo $lb['label_name']; ?></option>
													<?php
														} else {
													?>
														<option value="<?php echo $lb['label_id']; ?>"><?php echo $lb['label_name']; ?></option>
												<?php
														}
												}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card ">
					<div class="card-header bg-primary">
						<h3 class="card-title"> Location</h3>
						<div class="card-tools">
							<!-- <span title="3 New Messages" class="badge badge-primary">3</span> -->
							<button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<div class="row">

							<!-- pa_id	pa_address	pa_postal_code	pa_country	pa_state	pa_city	pa_area -->

							<!-- Country -->
							<div class="col-sm-4">
								<div class="form-group">
									<label for="">Country</label> <i class="req text-danger text-danger"> *</i>
									<select name="country" class="form-control" id="country">
										<option value="<?php echo $result->p_country; ?>" selected="selected"><?php echo $country; ?></option>
									</select>
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('country'); ?>
									</span>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="">State</label> <i class="req text-danger text-danger"> *</i>
									<select name="state" class="form-control" id="state">
										<?php
										if (!empty($States)) {
											foreach ($States as $state) {
												if ($state['state_id'] == $result->p_state) {
										?>
													<option value="<?php echo $state['state_id']; ?>" selected="selected"><?php echo $state['state_name']; ?></option>
												<?php
												} else {
												?>
													<option value="<?php echo $state['state_id']; ?>"><?php echo $state['state_name']; ?></option>
										<?php
												}
											}
										}
										?>
									</select>
								</div>
								<!-- validation errors -->
								<span class="badge badge-danger">
									<?php echo form_error('state'); ?>
								</span>
							</div>
							<!-- City -->
							<div class="col-sm-4">
								<div class="form-group">
									<label for="">City</label> <i class="req text-danger text-danger"> *</i>
									<div id="cities_select">
										<select name="city" class="form-control" id="city">
											<option value="<?php echo $result->p_city; ?>" selected="selected"><?php echo $city; ?></option>
										</select>
									</div>
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('city'); ?>
									</span>
								</div>
							</div>
							<!-- address -->
							<div class="col-sm-4">
								<div class="form-group">
									<label for="address">Address</label> <small class="req text-danger"> *</small>
									<input name="address" class="form-control " type="text" placeholder="Address" id="address" value="<?php echo $result->p_address; ?>">
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('address'); ?>
									</span>
								</div>
							</div>
							<!-- Zip/Postal Code -->
							<div class="col-sm-4">
								<div class="form-group">
									<label for="postal_code">Postal Code</label> <small class="req text-danger"> *</small>
									<input name="postal_code" class="form-control " type="text" placeholder="Postal Code" id="postal_code" value="<?php echo $result->p_postal_code; ?>">
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('postal_code'); ?>
									</span>
								</div>
							</div>
							<!-- Latitude -->
							<div class="col-sm-4">
								<div class="form-group">
									<label for="postal_code">Latitude</label> <small class="req text-danger"> *</small>
									<input name="latitude" class="form-control " type="number" step="any" placeholder="Latitude" id="latitude" value="<?php echo $result->p_latitude; ?>">
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('latitude'); ?>
									</span>
								</div>
							</div>
							<!-- Longitude -->
							<div class="col-sm-4">
								<div class="form-group">
									<label for="longitude">Longitude</label> <small class="req text-danger"> *</small>
									<input name="longitude" class="form-control " type="number" step="any" placeholder="Longitude" id="longitude" value="<?php echo $result->p_longitude; ?>">
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('longitude'); ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Bedrooms, Bathrooms, area size -->
				<!-- Bedrooms, Bathrooms, area size -->
				<div class="card">
					<div class="card-header bg-info">
						<h3 class="card-title"> Property Details</h3>
						<div class="card-tools">
							<!-- <span title="3 New Messages" class="badge badge-primary">3</span> -->
							<button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<!-- bedrooms -->
							<div class="col-sm-3">
								<div class="form-group">
									<label for="bedrooms">Bedrooms</label>
									<input name="bedrooms" class="form-control " type="text" placeholder="Bedrooms" id="bedrooms" value="<?php echo $result->p_bedrooms; ?>">
								</div>
							</div>

							<!-- bathrooms -->
							<div class="col-sm-3">
								<div class="form-group">
									<label for="bathrooms">Bathrooms</label>
									<input name="bathrooms" class="form-control " type="text" placeholder="Bathrooms" id="bathrooms" value="<?php echo $result->p_bathrooms; ?>">
								</div>
							</div>

							<!-- area_size -->
							<div class="col-sm-3">
								<div class="form-group">
									<label for="area_size">Area Size</label> <small class="req text-danger"> *</small>
									<input name="area_size" class="form-control " type="text" placeholder="Area Size" id="area_size" value="<?php echo $result->p_area; ?>">
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('area_size'); ?>
									</span>
								</div>
							</div>


							<!-- size_postfix -->
							<div class="col-sm-3">
								<div class="form-group">
									<label for="size_postfix">Size Postfix</label> <small class="req text-danger"> *</small>
									<input name="size_postfix" class="form-control " type="text" placeholder="Size Postfix" id="size_postfix" value="<?php echo $result->p_area_unit; ?>">
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('size_postfix'); ?>
									</span>
								</div>
							</div>
						</div>


						<!-- land area, postfix -->
						<div class="row">
							<!-- land area -->
							<div class="col-sm-3">
								<div class="form-group">
									<label for="land_area">Land Area</label> <small class="req text-danger"> *</small>
									<input name="land_area" class="form-control " type="text" placeholder="Land Area" id="land_area" value="<?php echo $result->p_land; ?>">
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('land_area'); ?>
									</span>
								</div>
							</div>


							<!-- land area postfix -->
							<div class="col-sm-3">
								<div class="form-group">
									<label for="land_area_postfix">Land Area Postfix</label> <small class="req text-danger"> *</small>
									<input name="land_area_postfix" class="form-control " type="text" placeholder="Land Area Postfix" id="land_area_postfix" value="<?php echo $result->p_land_unit; ?>">
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('land_area_postfix'); ?>
									</span>
								</div>
							</div>


							<!-- Garages -->
							<div class="col-sm-3">
								<div class="form-group">
									<label for="garages">Garages</label>
									<input name="garages" class="form-control " type="text" placeholder="Garages" id="garages" value="<?php echo $result->p_garage; ?>">
								</div>
							</div>

							<!-- garage_size -->
							<div class="col-sm-3">
								<div class="form-group">
									<label for="garage_size">Garage Size</label>
									<input name="garage_size" class="form-control " type="text" placeholder="Garage Size" id="garage_size" value="<?php echo $result->p_garages_unit; ?>">
								</div>
							</div>
						</div>

						<!-- Year Built -->
						<div class="row">
							<!-- year_built -->
							<div class="col-sm-3">
								<div class="form-group">
									<label>Year Built</label><i class="req text-danger text-danger"> *</i>
									<input name="year_built" class="form-control " type="text" placeholder="Year Built" id="year_built" value="<?php echo $result->p_year; ?>" requiredd="">
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('year_built'); ?>
									</span>
								</div>
							</div>


							<!-- price -->
							<div class="col-sm-3">
								<div class="form-group">
									<label>Price </label> <small class="req text-danger"> *</small>
									<input name="price" class="form-control " type="text" placeholder="Price" id="price" value="<?php echo $result->p_price; ?>" requiredd="">
									<!-- validation errors -->
									<span class="badge badge-danger">
										<?php echo form_error('price'); ?>
									</span>
								</div>
							</div>



							<!-- Facing -->
							<div class="col-sm-3">
								<div class="form-group">
									<label for="">Front Facing</label>
									<select name="front_facing" class="form-control select2-hidden-accessible" id="front_facing" data-select2-id="front_facing" tabindex="-1" aria-hidden="true">
										<?php
										if (!empty($facing_directions)) {
											foreach ($facing_directions as $f_dir) {
												if ($f_dir['facing_id'] == $result->p_front_facing) {
										?>
													<option value="<?php echo $f_dir['facing_id']; ?>" selected="selected"><?php echo $f_dir['facing_direction']; ?></option>
												<?php
												} else {
												?>
													<option value="<?php echo $f_dir['facing_id']; ?>"><?php echo $f_dir['facing_direction']; ?></option>
										<?php
												}
											}
										}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Private Note -->
				<div class="card">
					<div class="card-header bg-success">
						<h3 class="card-title"> Private Note</h3>
						<div class="card-tools">
							<!-- <span title="3 New Messages" class="badge badge-primary">3</span> -->
							<button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Write private note for this property, it will not display for public. </label>
									<textarea id="private_note" name="private_note" class="form-control summernote" rows="6" placeholder="">
                  <?php echo $result->p_private_note; ?>
                  </textarea>

								</div>
							</div>
						</div>

					</div>
				</div>

				<!-- Save Button -->
				<div class="card">

					<div class="card-footer ">
						<div class="form-group offset-sm-8 col-sm-4">
							<!-- <label>Submit</label> -->
							<button type="submit" name="save" value="add_property" class="form-control btn btn-success btn-sm  checkbox-toggle"><i class="fa fa-plus"> &nbsp;Update</i></button>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url(); ?>vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		$("document").ready(function() {

			$('#state').change(function() {
				var state_id = $(this).val();
				$.ajax({

					url: '<?php echo base_url('index.php/admin/property/getCities'); ?>',
					type: 'POST',
					data: {
						state_id: state_id
					},
					dataType: 'json',
					success: function(response) {
						if (response['cities']) {
							$("#cities_select").html(response['cities']);
						}
					}
				})
			})

		})
	</script>