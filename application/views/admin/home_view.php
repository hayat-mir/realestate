<!-- !-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">

			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('index.php/admin/home/index'); ?>">Admin</a></li>
						<li class="breadcrumb-item active">Dashboard</li>

					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- Main content -->
	<!-- /.content-header -->
	<!-- /.content-header -->
	<!-- Main content -->



	<?php
	// $fmt = new NumberFormatter('de_DE', NumberFormatter::CURRENCY);
	// echo $fmt->formatCurrency(1234567.891234567890000, "EUR")."\n";
	// echo $fmt->formatCurrency(1234567.891234567890000, "RUR")."\n";
	$total_value = 0;
	$total_prop = 0;
	$un_sold = 0;
	$un_sold_price = 0;
	$sold = 0;
	$sold_price = 0;
	foreach ($value as $v1) {
		if ($v1->p_label == 1) {
			$un_sold_price += $v1->p_price;
			$un_sold++;
		} else {
			$sold_price +=	$v1->p_price;
			$sold++;
		}
		$total_value += $v1->p_price;
		$total_prop++;
	} ?>
	<section class="content">
		<div class="container-fluid">
			<!-- alert message -->
			<!-- content START -->
			<!-- Info-Box -->
			<div class="row">
				<div class="col-12 col-sm-6 col-md-4">
					<div class="info-box">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-cog"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Total Properties Value</span>
							<div class="info-box-number">
								<span class="info-box-number">
									<?php
									$fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY);
									echo $fmt->formatCurrency($total_value, "INR");
									?>
								</span>
							</div>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>

				<div class="col-12 col-sm-6 col-md-4">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-thumbs-up"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Unsold Properties Value</span>
							<span class="info-box-number">
								<?php
								$fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY, 1);
								echo $fmt->formatCurrency($un_sold_price, "INR");

								?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>

				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>

				<div class="col-12 col-sm-6 col-md-4">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Sold Properties Value</span>
							<span class="info-box-number">
								<?php $fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY);
								echo $fmt->formatCurrency($sold_price, "INR");
								?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
			</div>

			<!-- Small box -->
			<div class="row">

				<div class="col-12 col-sm-6 col-md-4">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php echo $total_prop; ?></h3>

							<p>Total Properties</p>
						</div>
						<div class="icon">
							<i class="fas fa-building"></i>
						</div>

					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4">
					<!-- small box -->
					<div class="small-box bg-primary">
						<div class="inner">
							<h3>
								<?php echo $un_sold; ?> </h3>
							<p>Total Unsold Properties</p>

						</div>
						<div class="icon">
							<i class="fas fa-building"></i>
						</div>

					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3> <?php echo $sold; ?> </h3>

							<p>Total Sold Properties</p>
						</div>
						<div class="icon">
							<i class="fas fa-chart-pie"></i>
						</div>

					</div>
				</div>
			</div> <!-- content END -->
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->