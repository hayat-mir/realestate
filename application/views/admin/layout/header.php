<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>
  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo base_url() . $setting->favicon; ?>" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/fontawesome-free/css/all.min.css">
  <script src="https://kit.fontawesome.com/75c1adf2b0.js" crossorigin="anonymous"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- msg -->
  <link rel="stylesheet" type="text/css" href="css/slick.css"> <!-- Slick CSS -->
  <link rel="stylesheet" type="text/css" href="css/slick-theme.css"> <!-- Slick CSS min -->
  <link rel="stylesheet" type="text/css" href="css/search.css"> <!-- Manual css file -->
  <style>
    .msg-box-inner .card-header {
      justify-content: space-between;
      align-items: center;
    }

    .msg-box-inner .card-title {
      font-size: 1rem;
    }

    .card-body .msg-from {
      display: flex;
      justify-content: space-between;
    }

    @media(max-width: 425px) {
      .card-body .msg-from {
        display: block;
      }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">