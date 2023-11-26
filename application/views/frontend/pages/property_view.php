<?php
// echo "<pre>";
// print_r($images);
// echo "</pre>";
?>

<div class="container">
	<div class="property-view-wrap">
		<!-- Flash data Success -->
		<?php if ($this->session->flashdata('success') != null) { ?>
			<div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
				<strong><?php echo $this->session->flashdata('success'); ?></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php } ?>
		<!-- Flash data Failure -->
		<?php if ($this->session->flashdata('failure') != null) { ?>
			<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
				<strong><?php echo $this->session->flashdata('failure'); ?></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php } ?>
		<!-- Property Name, Price and Location Section -->
		<section class="prop-name-loc-wrap">
			<div class="name-price">
				<h3 class="property-name"><?php echo $property->p_title ?></h3>
				<?php $fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY); ?>
				<span class="property-price"><?php echo $fmt->formatCurrency($property->p_price, "INR"); ?></span>
			</div>
			<div class="property-features-tags">
				<span class="feature label-tag"><?php echo $property->label_name ?></span>
				<span class="feature status-tag"><?php echo $property->status_name ?></span>
			</div>
			<address>
				<i class="fa-solid fa-location-dot"></i>
				<?php echo $property->p_address . ", " . $property->state_name . ", " . $property->city_name . ", " . $property->country_name . ", " . $property->p_postal_code; ?>
			</address>
		</section>
		<!-- End prop-name-loc section -->

		<!-- Image Gallery-Carousel Section -->
		<section class="gallery-carousel-wrap">
			<div class="carousel-wrap">
				<?php $count = 0; ?>
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php foreach ($images as $img) {
							if ($count == 0) {
						?>
								<div class="carousel-item active">
									<img class="d-block w-100" src="<?php echo base_url() . $img['img_file_path'] ?>" alt="First slide">
								</div>
							<?php $count++;
							} else { ?>
								<div class="carousel-item">
									<img class="d-block w-100" src="<?php echo base_url() . $img['img_file_path'] ?>" alt="Second slide">
								</div>
						<?php }
						} ?>
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

			<div class="gallery-wrap">
				<div class="property-images-gallery">
					<?php foreach ($images as $img) { ?>
						<div class="prop-img-inner">
							<img class="d-block" src="<?php echo base_url() . $img['img_file_path'] ?>" alt="img not found" loading="lazy" />

						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<!-- End gallery-carousel section -->

		<!-- Overview Section -->
		<section class="overview-wrap">
			<div class="property-overview-wrap">
				<h5 class="overview-heading">Overview</h5>
				<div class="property-overview-data">
					<ul>
						<li class="property-overview-item"><strong><?php echo $property->type_name ?></strong></li>
						<li class="property-overview-type">Property Type</li>
					</ul>
					<ul>
						<li class="property-overview-item"><i class="fa-solid fa-bed"></i><?php echo $property->p_bedrooms ?></li>
						<li>Bedrooms</li>
					</ul>
					<ul>
						<li class="property-overview-item"><i class="fa-solid fa-shower"></i><?php echo $property->p_bathrooms ?></li>
						<li>Bathrooms</li>
					</ul>
					<ul>
						<li class="property-overview-item"><i class="fa-solid fa-car"></i><?php echo $property->p_garage ?></li>
						<li>Garage</li>
					</ul>
					<ul>
						<li class="property-overview-item"><i class="fa-solid fa-chart-area"></i><?php echo $property->p_area ?></li>
						<li><?php echo $property->p_area_unit ?></li>
					</ul>
					<ul>
						<li class="property-overview-item"><i class="fa-solid fa-calendar-days"></i><?php echo $property->p_year ?></li>
						<li>Year Built</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- End overview section -->

		<!-- Description Section -->
		<section class="description-wrap">
			<div class="property-description-wrap">
				<h5 class="description-heading">Description</h5>
				<div class="description-content">
					<p class="descrip"><?php echo $property->p_content ?></p>
				</div>
			</div>
		</section>
		<!-- End description section -->

		<!-- Address Section -->
		<section class="address-wrap">
			<div class="property-address-wrap">
				<h5 class="address-heading">Address</h5>
				<div class="prop-address-details">
					<ul>
						<li class="address-item">
							<strong>Address</strong>
							<span class="text-muted"><?php echo $property->p_address ?></span>
						</li>
						<li class="address-item">
							<strong>City</strong>
							<span class="text-muted"><?php echo $property->city_name ?></span>
						</li>
						<li class="address-item">
							<strong>State</strong>
							<span class="text-muted"><?php echo $property->state_name ?></span>
						</li>
						<li class="address-item">
							<strong>Zip/Postal Code</strong>
							<span class="text-muted"><?php echo $property->p_postal_code ?></span>
						</li>
						<li class="address-item">
							<strong>Area</strong>
							<span class="text-muted"><?php echo $property->p_area . " " . $property->p_area_unit ?></span>
						</li>
						<li class="address-item">
							<strong>Country</strong>
							<span class="text-muted"><?php echo $property->country_name ?></span>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- End address section -->

		<!-- Details Section -->
		<section class="details-wrap">
			<div class="property-details-wrap">
				<div class="details-heading-wrap">
					<h5 class="details-heading">Details</h5>
					<span class="created-date"><i class="fa-solid fa-calendar-days"></i>Created On <?php echo $property->p_doc ?></span>
				</div>
				<ul>
					<li class="details-item">
						<strong>Property Type</strong>
						<span class="text-muted"><?php echo $property->type_name ?></span>
					</li>
					<li class="details-item">
						<strong>Property Price</strong>
						<?php $fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY); ?>
						<span class="text-muted"><?php echo $fmt->formatCurrency($property->p_price, "INR"); ?></span>
					</li>
					<li class="details-item">
						<strong>Property Area</strong>
						<span class="text-muted"><?php echo $property->p_area . " " . $property->p_area_unit ?></span>
					</li>
					<li class="details-item">
						<strong>Bedrooms</strong>
						<span class="text-muted"><?php echo $property->p_bedrooms ?></span>
					</li>
					<li class="details-item">
						<strong>Bathrooms</strong>
						<span class="text-muted"><?php echo $property->p_bathrooms ?></span>
					</li>
					<li class="details-item">
						<strong>Garage:</strong>
						<span class="text-muted"><?php echo $property->p_garage ?></span>
					</li>
					<li class="details-item">
						<strong>Garage Size:</strong>
						<span class="text-muted"><?php echo $property->p_garages_unit ?></span>
					</li>
					<li class="details-item">
						<strong>Property Status:</strong>
						<span class="text-muted"><?php echo $property->status_name ?></span>
					</li>
					<li class="details-item">
						<strong>Property Label</strong>
						<span class="text-muted"><?php echo $property->label_name ?></span>
					</li>
					<li class="details-item">
						<strong>Year Built</strong>
						<span class="text-muted"><?php echo $property->p_year ?></span>
					</li>
				</ul>
			</div>
		</section>
		<!-- End details section -->

		<!-- Map Section: Using Google Maps API -->
		<section class="maps-location-wrap">
			<div class="map-title">
				<h5 class="map-heading">Location </h5>
				<p class="text-muted">Property location..</p>
			</div>
			<div class="property-location-map" id="map" style="height: 400px;">
				<span id="latitude"><?php echo $property->p_latitude ?></span>
				<span id="longitude"><?php echo $property->p_longitude ?></span>
			</div>
		</section>
		<!-- Map section end -->

        <!-- Weather Section -->
        <section class="weather-wrap">
   	     <div class="property-weather-wrap">
   		     <h5 class="weather-title">Weather</h5>
   		     <div class="weather-details">
   			<!-- fetch and prepare weather data -->
			<?php
                $lat = $property->p_latitude;
                $lon = $property->p_longitude;
                $api_key = '0e4f5b91c71d5b231704999652e96e80';
                $api_url = 'https://api.openweathermap.org/data/2.5/weather?lat='.$lat.'&lon='.$lon.'&appid='.$api_key.'&units=metric';

                $weather_data = json_decode(file_get_contents($api_url),true);

                $temperature = $weather_data['main']['temp'];
                $weather_type = $weather_data['weather'][0]['main'];
                $weather_descrip = $weather_data['weather'][0]['description'];
                $weather_icon = $weather_data['weather'][0]['icon'];
				$weather_loc_name = $weather_data['name'];
            ?>

   			<!-- display data -->
   			     <span>The Current Weather in <strong><?php echo $weather_loc_name ?> </strong> is:</span>
   			     <span> <img src="http://openweathermap.org/img/wn/<?php echo $weather_icon ?>@2x.png" alt="not avlbl"/> <i><?php echo $temperature ?>	&#8451; </i></span>
   			     <span> <?php echo $weather_type ?> <br> <i><?php echo $weather_descrip ?></i></span>
   		     </div>
   	     </div>
        </section>
   <!-- End weather section -->

		<!-- Contact Form Section -->

		<section class="contact-info-wrap">
			<form method="post" action="<?php echo base_url() ?>index.php/message/save_message?id=<?php echo $property->p_id ?>">
				<input type="hidden" name="p_id" value="<?php echo $property->p_id; ?>">
				<div class="form-heading-wrap">
					<h6 class="form-heading text-muted">Enquire About This Property <input type="hidden" id="unique_id" value="<?php echo $this->session->userdata('user_id'); ?>"></h6>
				</div>
				<div class="row mb-4">
					<div class="col">
						<div class="form-outline">
							<label class="form-label" for="form3Example1">UserName</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="UserName" value="<?php echo $this->session->userdata('fullname'); ?>" />
						</div>
					</div>
					<div class="col">
						<div class="form-outline">
							<label class="form-label" for="form3Example2">Address</label>
							<input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $this->session->userdata('address'); ?>" />
						</div>
					</div>
				</div>
				<div class="row mb-4">
					<div class="col">
						<div class="form-outline">
							<label class="form-label" for="form3Example2">Phone</label>
							<input type="number" name="phone" class="form-control" placeholder="Phone No" value="<?php echo $this->session->userdata('mobile'); ?>" />
						</div>
					</div>
					<div class="col">
						<div class="form-outline">
							<label class="form-label" for="form3Example2">Email</label>
							<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $this->session->userdata('email'); ?>" />
						</div>
					</div>
				</div>

				<!-- Email input -->
				<div class="form-outline mb-4">
					<label class="form-label" for="form3Example3">Subject</label>
					<input type="text" name="subject" class="form-control" placeholder="subject" />
				</div>

				<!-- Password input -->
				<div class="form-outline mb-4">
					<label class="form-label" for="form3Example4">Message</label>
					<textarea class="form-control" name="user_query">
					Hello, I am interested in [<?php echo $property->p_title; ?>]
					</textarea>
				</div>
				<div class="d-flex">
					<!-- Submit button -->
					<button type="submit" id="check_login_user" class="btn btn-success btn-sm-full-width mb-4 mr-2">Request Information</button>
			</form>

			<?php if (!($this->session->userdata('isLogIn'))) { ?>
				<a href="<?php echo base_url('index.php/login/register'); ?>"><button id="check_login_user" class="btn btn-success btn-sm-full-width mb-4">Register</button></a>
			<?php } ?>
	</div>
	</section>
	<!-- End contact form section -->

</div>
</div>
<script type="text/javascript">
	$("document").ready(function() {
		$('#check_login_user').click(function(e) {
			var user_id = $("#unique_id").val();
			if (user_id == '') {
				alert("please register first");
				e.preventDefault();
				return false;
			}
		})
	})
</script>