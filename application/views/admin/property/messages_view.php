<!-- !-- Content Wrapper. Contains page content -->
<!-- <?php
      // print_r($Messages_list);
      ?> -->

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
            <li class="breadcrumb-item"></li>
            <li class="breadcrumb-item active">User Messages</li>
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

  <div class="col-sm-12">
    <div class="card">
      <div class="card-header bg-info">
        <h3 class="card-title">
          Messages List
        </h3>
        <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
      </div>
      <div class="card-body" id="tbl">
        <div class="card-body">
          <div class="form-group">
            <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
              <thead>
                <tr>
                  <th><?php echo ('S.No.') ?></th>
                  <th><?php echo ('UserName') ?></th>
                  <th><?php echo ('Address') ?></th>
                  <th><?php echo ('Phone No') ?></th>
                  <th><?php echo ('Email') ?></th>
                  <th><?php echo ('Subject') ?></th>
                  <th><?php echo ('Message') ?></th>
                </tr>
              </thead>
              <tbody id="">
                <?php $i = 1; ?>
                <?php
                if (!empty($Messages_list)) {
                  foreach ($Messages_list as $index => $val1) { ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <?php
                      if ($val1->read_status == 0) { ?>
                        <td class="badge bg-warning font-weight-bold"><a href="<?php echo base_url(); ?>index.php/message/user_msg_details?m_id=<?php echo  $val1->msg_id; ?>"> <?php echo $val1->username; ?> </a></td>
                      <?php } else {
                      ?>
                        <td class=""><a href="<?php echo base_url(); ?>index.php/message/user_msg_details?m_id=<?php echo  $val1->msg_id; ?>"> <?php echo $val1->username; ?> </a></td>
                      <?php
                      }
                      ?>

                      <td><?php echo $val1->address; ?></td>
                      <td> <?php echo $val1->phone; ?></td>
                      <td><?php echo $val1->email; ?></td>
                      <td> <?php echo $val1->subject; ?></td>
                      <td><?php echo $val1->message; ?></td>
                    </tr>
                  <?php
                    $i++;
                  }
                } else { ?>
                  <tr class="text-center ">
                    <td colspan='7'> No User Messages found!</td>
                  </tr>
                <?php } ?>


              </tbody>
            </table>
          </div>
        </div>
      </div>
      </body>

      </html>