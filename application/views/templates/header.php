<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web HIMA-IF</title>

    <!-- link untuk Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/style_sidebar.css">

</head>

<body>
    <main>
        <div class="flex-shrink-0 p-3 shadow bg-white " style="width: 280px;">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                <span class="fs-5 fw-semibold">HIMA-IF ADMIN</span>
            </a>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        Dashboard
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">Dashboard</a></li>
                            <li><a href="#" class="link-dark rounded">Program Kerja</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#data-collapse" aria-expanded="false">
                        Master Data
                    </button>
                    <div class="collapse" id="data-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="<?= site_url('anggota') ?>" class="link-dark rounded">Data Anggota</a></li>
                            <li><a href="#" class="link-dark rounded">Data Kepengurusan</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#pemilu-collapse" aria-expanded="false">
                        Pemilu
                    </button>
                    <div class="collapse" id="pemilu-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">Pengaturan</a></li>
                            <li><a href="#" class="link-dark rounded">Data Kandidat</a></li>
                            <li><a href="#" class="link-dark rounded">Data Suara</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#admin-collapse" aria-expanded="false">
                        Data Admin
                    </button>
                    <div class="collapse" id="admin-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="<?= site_url('user') ?>" class="link-dark rounded">List Admin</a></li>
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
                <small> Hello, Admin! You're Login as Admin </small>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        Account
                    </button>
                    <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">Change Password</a></li>
                            <li><a href="#" class="link-dark rounded">Sign out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>