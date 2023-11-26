<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>dist/css/adminlte.min.css">
  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('./assets/images/favicon.ico'); ?>" type="image/x-icon">
  <style>
    .badge-danger {
      background-color: transparent;
      color: red;
    }

    .badge-danger p {
      font-size: 10px;
    }
  </style>
</head>


<body style="background-color:#e9ecef;">
  <?php if ($this->session->flashdata('failure') != null) { ?>
    <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
      <strong><?php echo $this->session->flashdata('success'); ?></strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php } ?>
  <div class="content-wrapper mt-5" style="background-color:#e9ecef; line-height:1;">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="offset-2 col-md-5">
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title"> Register Form</h3>
              </div>
              <form method="post" action="<?php echo base_url('index.php/login/register_data'); ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div>
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="uname" placeholder="Enter username">
                    <span class="badge badge-danger text-sm">
                      <?php echo form_error('uname'); ?>
                    </span>
                  </div>
                  <div>
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="uemail" placeholder="Enter email" pattern="^[a-zA-Z0-9._%+-]*[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>



                    <span class="badge badge-danger text-sm">
                      <?php echo form_error('uemail'); ?>
                    </span>
                  </div>
                  <div>
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="upass" placeholder="Password">
                    <span class="badge badge-danger text-sm">
                      <?php echo form_error('upass'); ?>
                    </span>
                  </div>
                  <div>
                    <label for="exampleInputPassword1">Phone No.</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="uphone" placeholder="Phone number" maxlength="10">

                    <span class="badge badge-danger text-sm">
                      <?php echo form_error('uphone'); ?>
                    </span>
                  </div>
                  <div>
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="uaddr" placeholder="Address">
                    <span class="badge badge-danger text-sm">
                      <?php echo form_error('uaddr'); ?>
                    </span>
                  </div>
                  <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success btn-outline-danger text-white btn-block">Submit</button>
                  </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </section>
</body>

</html>