<?php $this->load->view("frontend/layout/header_view");
?>
<?php $this->load->view("frontend/layout/navbar_view");
?>

<!-- content START -->
<?php  echo (!empty($content) ? $content : null) ?>
<!-- Content END -->
<?php $this->load->view("frontend/layout/footer_view");
?>