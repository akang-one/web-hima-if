<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMA-IF</title>

    <!-- link untuk Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css");

    <!-- Templates Web Page -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>webpage/css/style.css">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1 class="text-light"><a href="index.html"><span>HIMA-IF</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="<?= base_url() ?>">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Kepengurusan</a></li>
                    <li><a class="nav-link scrollto" href="#services">Program</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('voting') ?>">Pemilu</a></li>
                    <li><a class="getstarted scrollto" href="<?= site_url('admin') ?>">Login Admin</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->