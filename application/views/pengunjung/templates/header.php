<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title ? $title : "Bus Booking Management System" ?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/assets/img/favicon.png" rel="icon">
  <link href="<?= base_url() ?>assets/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v2.0.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h3 class="logo mr-auto mr-0"><a href="<?= base_url()."Pengunjung/Home"; ?>">Bus Booking</a></h3>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <?php
        $data_pengunjung = $this->session->userdata('pengunjung'); 
      ?>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="<?= $this->uri->segment(2) == 'home' ? 'active' : ''; ?>"><a href="<?= base_url()."Pengunjung/home" ?>">Home</a></li>
          <li class="<?= ($this->uri->segment(2) == 'Booking' && $this->uri->segment(3) == 'index') ? 'active' : ''; ?>"><a href="<?= base_url()."Pengunjung/Booking/index"?>">Booking</a></li>
          <li class="<?= ($this->uri->segment(2) == 'Booking' && $this->uri->segment(3) == 'list_schedule') ? 'active' : ''; ?>"><a href="<?= base_url()."Pengunjung/Booking/list_schedule"?>">Daftar Perjalanan</a></li>
          

          <?php
            if(isset($data_pengunjung) && !empty($data_pengunjung)){
          ?>
            <li><a href="#doctors">Pesanan</a></li>
            <!-- <li><a href="#contact">Kontak</a></li> -->
            <li class="drop-down"><a href="#"><?= $data_pengunjung->name ?></a>
              <ul>
                <li><a href="<?= base_url()."Pengunjung/Auth/logout"; ?>">Logout</a></li>
              </ul>
            </li>
          <?php
            } else {
          ?>
            <li class="<?= ($this->uri->segment(2) == 'auth' && $this->uri->segment(3) == 'index') ? 'active' : ''; ?>"><a href="<?= base_url()."Pengunjung/auth/index" ?>">Login</a></li>
            <li class="<?= ($this->uri->segment(2) == 'auth' && $this->uri->segment(3) == 'register') ? 'active' : ''; ?>"><a href="<?= base_url()."Pengunjung/auth/register" ?>">Register</a></li>
          <?php
            }
          ?>

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
