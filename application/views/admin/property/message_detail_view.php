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
            <li class="breadcrumb-item"></li>
            <li class="breadcrumb-item active">User Messages</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline msg-box-inner">
          <div class="card-header bg-warning">
            <h3 class="card-title">Read Message From : <strong><?php echo $sp_user_Message->username; ?></strong></h3>
            <div class="card-tools">
              <a href="<?php echo base_url('index.php/message/user_messages'); ?>" class="btn btn-tool" title="Back To Messages"><i class="fas fa-reply text-dark"></i></a>
            </div>
          </div>

          <div class="card-body">
            <div class="mailbox-read-info">
              <p>
                <strong class="text-info"> Subject:  </strong><b><?php echo $sp_user_Message->subject; ?></b>
              </p>
              <h6 class="msg-from">
                From:  <?php echo $sp_user_Message->email; ?> <br><span class="mailbox-read-time text-muted"><?php echo $sp_user_Message->msg_date; ?></span>
              </h6>

            </div>

            <div class="mailbox-read-message">
              <p>
                <?php echo $sp_user_Message->message; ?>
              </p>
            </div>
          </div>

          <div class="card-footer">
            <a href="<?php echo base_url() ?>index.php/message/user_msg_delete?m_id=<?php echo $sp_user_Message->msg_id ?>" type="button" class="btn btn-danger float-right"><i class="far fa-trash-alt"></i> Delete</a>
          </div>
        </div>
      </div>
    </div>
  </div>