<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/bootstrap.min.css') ?>" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/style.css') ?>" crossorigin="anonymous">
  <title><?= $judul; ?> <?= @$ukm ?></title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">DATA UKM STIMATA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="<?= base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="<?= base_url('ukm/index/Clan486') ?>">Clan486</a>
          <a class="nav-item nav-link" href="<?= base_url('ukm/index/ECS') ?>">ECS</a>
          <a class="nav-item nav-link" href="<?= base_url('ukm/index/Hipmis') ?>">Hipmis</a>
          <a class="nav-item nav-link" href="<?= base_url('ukm/index/KKI') ?>">KKI</a>
          <a class="nav-item nav-link" href="<?= base_url('ukm/index/Futsal') ?>">Futsal</a>
          <!-- <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Management Akun
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?= base_url('auth/daftar') ?>">Tambah Akun</a>
              <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>