<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('index.php/admin/home/index'); ?>" class="brand-link">
    <img src="<?php echo base_url() . $setting->logo; ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8;height:100px; background-color:white;max-height:30px;padding:3px;">
    <span class="brand-text font-weight-light text-white">
      <?php echo $setting->title; ?>
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>dist/img/User2-160x160.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin Panel</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url('index.php/admin/home/index'); ?>" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <!-- <i class="right fas fa-angle-left"></i> -->
            </p>
          </a>
        </li>
        <!-- ############# Property #############-->
        <li class="nav-item ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-building"></i>
            <p>
              Property<i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('index.php/admin/property/index'); ?>" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Property</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('index.php/admin/property/list'); ?>" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Property List</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('index.php/admin/property/property_document') ?>" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Property Documents</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('index.php/admin/property/property_image') ?>" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Property Images</p>
              </a>
            </li>
          </ul>
        </li>


        <!-- ############# Settings#############-->
        <li class="nav-item ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Settings <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('index.php/admin/property/app_setting'); ?>" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>App Setting</p>
              </a>
            </li>
          </ul>
        </li>

        <!--############# Contact#############-->
        <li class="nav-item">
          <a href="<?php echo base_url('index.php/message/user_messages'); ?>" class="nav-link ">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Message <span id="active_msg_count" class="badge-pill bg-danger ml-3 pl-3 pr-3 pt-1 pb-1"></span>
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<script src="<?php echo base_url(); ?>vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  $("document").ready(function() {
    //  setInterval(function() { 
    $.post("<?php echo base_url('index.php/message/check_user_msg'); ?>", {
      check_msg: 'flag'
    }, function(response) {
      if (response > 0) {
        $('#active_msg_count').show();
        $('#active_msg_count').text(response);
      } else {
        $('#active_msg_count').hide();
      }
    });
    //  }, 100);
  });
</script>