<style>
    .badge-danger{background-color: transparent; color:red;}
    .badge-danger p{font-size:10px;}
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
						<li class="breadcrumb-item active">Add Image</li>

					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- Flash data Success -->
	<?php if ($this->session->flashdata('success') != null) { ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong><?php echo $this->session->flashdata('success'); ?></strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php } ?>
	<!-- Flash data Failure -->
	<?php if ($this->session->flashdata('failure') != null) { ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong><?php echo $this->session->flashdata('failure'); ?></strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php } ?>
	<div class="card">
		<div class="card-header bg-primary">
			Add Image
		</div>
		<div class="card-body">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<form action="<?php echo base_url('index.php/admin/property/image_upload'); ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="type">Property Title</label> <i class="req text-danger"> *</i>
								<select name="property_title" class="form-control" id="type">
									<option value="">Select Property</option>
									<?php
									if (!empty($type)) {
										foreach ($type as $tp) {
									?>
											<option value="<?php echo $tp['p_id']; ?>"><?php echo $tp['p_title']; ?></option>
									<?php	}
									} ?>
								</select>
								<span class="badge badge-danger">
									<?php echo form_error('property_title');
									?>
								</span>
							</div>
					</div>
					<div class="col-md-3 form-group text-black">
						<label for="title">Image Name</label><i class="req text-danger"> *</i>
						<input type="text" id="title" class="form-control" placeholder="property title" name="img_title" value="">
						<span class="badge badge-danger">
							<?php echo form_error('img_title');
							?>
						</span>
					</div>

					<div class="col-md-4 form-group">
						<label for="inputGroupFile01">Attach file</label><i class="req text-danger"> *(Note: choose only jpg,png)</i>
						<input type="file" class="form-control" id="inputGroupFile01" name="img_file_path">
					</div>
					<div class="col-md-2 form-group text-center pt-4">
						<button class="btn btn-info" type="submit">Upload <i class="fa-solid fa-cloud-arrow-up"></i></button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Display -->
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-primary">
				<h3 class="card-title">
					Image List
				</h3>
				<!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
			</div>
			<div class="card-body col-sm-12">
				<div class="d-flex">
					<div class="form-group w-75">
						<form action="<?php echo base_url('index.php/admin/property/image_list'); ?>" method="post">
							<label for="type">Property Title</label> <i class="req text-danger"> *</i>
							<select name="pty_type" class="form-control" id="pt_type">
								<option value="">Select Property</option>
								<?php
								if (!empty($type)) {
									foreach ($type as $tp) {
								?>
										<option value="<?php echo $tp['p_id']; ?>"><?php echo $tp['p_title']; ?></option>
								<?php	}
								} ?>
							</select>
					</div>
					<div class="btn mt-4 ml-4">
						<button class="btn btn-info" type="submit">Search <i class="fa-solid fa-magnifying-glass"></i></button>
					</div>
					</form>
				</div>
				<div class="">
					<table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
						<thead>
							<tr>
								<th><?php echo ('Unique Id') ?></th>
								<th><?php echo ('Property Title') ?></th>
								<th><?php echo ('Image Name') ?></th>
								<th><?php echo ('Action') ?></th>
							</tr>
						</thead>
						<tbody id="">
							<?php
							if (!empty($list)) {
								$i = 1;
								foreach ($list as $val1) { ?>
									<tr>
										<td> <?php echo $i; ?></td>
										<?php
										if (!empty($type)) {
											foreach ($type as $tp) {
												if ($tp['p_id'] == $val1['img_p_id']) {
										?>
													<td><?php echo $tp['p_title'];
														}
													}
												} ?></td>
													<td> <?php echo $val1['img_title']; ?></td>
													<td class="text-center">
														<a href="<?php echo base_url(); ?>index.php/admin/property/image_delete?id=<?php echo $val1['img_id']; ?>"> <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
														<a href="<?php echo base_url(); ?>index.php/admin/property/image_download?path=<?php echo $val1['img_file_path']; ?>"> <button type="button" class="btn btn-success btn-sm"><i class="fa fa-download"></i></button></a>
													</td>
									</tr>
								<?php
									$i++;
								}
							} else { ?>
								<tr class="text-center ">
									<td colspan='4'> No records found!</td>
								</tr>
							<?php } ?>


						</tbody>
					</table>
				</div>
			</div>