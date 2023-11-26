<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/nav'); ?>
<?php $this->load->view('admin/layout/leftsidebar_view', $setting); ?>

<section class="content bg-light p-2">
  <div class="container-fluid ">
    <?php echo !empty($content) ? $content : null; ?>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<?php $this->load->view('admin/layout/footer', $setting); ?>