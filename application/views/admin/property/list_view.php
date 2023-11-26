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
            <li class="breadcrumb-item active">List Property</li>

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
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-list"></i> List Properties</h3>
    </div>
    <div class="card-body">
      <div class="row ">
        <?php if (!empty($properties)) {
          foreach ($properties as $index => $property) { ?>
            <!-- card 1 -->
            <div class=" col-sm-12 col-md-6 col-lg-4">
              <div class="card ">
                <a href="<?php echo base_url() ?>index.php/admin/property/detail?id=<?php echo $property->p_id ?>">
                  <?php
                  foreach ($images as $img)
                    if ($img['img_p_id'] == $property->p_id) {
                      $path = base_url() . $img['img_file_path']; ?>
                    <img class="card-img-top" height="200px" src="<?php echo $path; ?>" alt="Card image cap">
                  <?php
                      break;
                    }
                  ?>
                  <!--<img class="card-img-top" height="200px" src="https://picsum.photos/200/200" alt="Card image cap">-->
                </a>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="card-title float-none text-center text-primary font-weight-bold mb-2"><?php echo $property->p_title; ?></h5>
                    </div>
                  </div>

                  <div class="row text-center">
                    <div class="col-sm-6">Type</div>
                    <div class="col-sm-6 text-nowrap">
                      <strong><?php
                              foreach ($type as $value)
                                if ($value['type_id'] == $property->p_type)
                                  echo $value['type_name'];
                              ?></strong>
                    </div>
                  </div>


                  <div class="row text-center">
                    <div class="col-sm-6">Label</div>
                    <div class="col-sm-6">
                      <strong><?php
                              foreach ($label as $value)
                                if ($value['label_id'] == $property->p_label)
                                  echo $value['label_name'];
                              ?></strong>
                    </div>
                  </div>

                  <div class="row text-center">
                    <div class="col-sm-6">Address</div>
                    <div class="col-sm-6">
                      <strong><?php echo $property->p_address; ?></strong>
                    </div>
                  </div>

                  <div class="row text-center">
                    <div class="col-sm-6">Status</div>
                    <div class="col-sm-6">
                      <strong><?php foreach ($status as $value)
                                if ($value['status_id'] == $property->p_status)
                                  echo $value['status_name']; ?></strong>
                    </div>
                  </div>


                  <div class="row text-center">
                    <div class="col-sm-6">Area</div>
                    <div class="col-sm-6">
                      <strong><?php echo $property->p_area . ' ' . $property->p_area_unit; ?></strong>
                    </div>
                  </div>

                  <div class="row text-center mb-2">
                    <div class="col-sm-6">Price</div>
                    <div class="col-sm-6">
                      <strong> <?php
                                $fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY);
                                echo $fmt->formatCurrency($property->p_price, "INR");
                                ?>
                      </strong>
                    </div>
                  </div>
                  <!-- footer -->
                  <div class="row mt-4 mb-4">
                    <div class="col-sm-12 text-center">
                      <span class="dtr-data">
                        <!-- edit -->
                        <a href="<?php echo base_url(); ?>index.php/admin/property/edit?id=<?php echo $property->p_id; ?>">
                          <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        </a>
                        <!-- add document -->
                        <a href="<?php echo base_url(); ?>index.php/admin/property/property_document">
                          <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-file"></i></button>
                        </a>
                        <!-- add image -->
                        <a href="<?php echo base_url(); ?>index.php/admin/property/property_image">
                          <button type="button" class="btn btn-success btn-sm"><i class="fa fa-image"></i></button>
                        </a>
                        <!-- delete -->
                        <a href="<?php echo base_url(); ?>index.php/admin/property/delete?id=<?php echo $property->p_id ?>">
                          <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure') "><i class="fa fa-trash"></i></button>
                        </a>
                      </span>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          <?php }
        } else { ?>

        <?php
          echo "No records Available!";
        }
        ?>




      </div>

    </div>
  </div>