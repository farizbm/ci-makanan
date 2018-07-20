<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">

  <!-- Iconic Icon -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <title>Aplikasi Inventori</title>
  </head>
  <body>
    <div class="container">
      <ul class="nav justify-content-center">
        <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Master</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo base_url('index.php/data') ?>">Makanan</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pemesanan</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo base_url('index.php/data/pesanan') ?>">Pemesanan</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo base_url('index.php/User_auth/logout') ?>">Log Out</a>

          </div>
        </li>
      </ul>
    </div>