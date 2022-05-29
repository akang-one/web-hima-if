<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pemilu</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/pemilupage/') ?>vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/pemilupage/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/pemilupage/') ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/pemilupage/') ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/pemilupage/') ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/pemilupage/') ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/pemilupage/') ?>css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
                <li><a href="#kandidat" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Kandidat</span></a></li>
                <li><a href="<?= site_url('voting/logout_pemilih') ?>" class="nav-link scrollto"><i class="bx bx-log-out"></i> <span>Keluar</span></a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <h1>Pemilihan Umum</h1>
            <h2>HIMA - IF</h2>
            <p>Mari <span class="typed" data-typed-items="Pilih, Dukung, Sukseskan"></span></p> <br>
            <h3>"Untuk <?= $nama_voting; ?> <small>Periode</small> <strong><?= $periode; ?></strong>"</h3>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= kandidat Section ======= -->
        <section id="kandidat" class="kandidat">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kandidat</h2>
                    <p>Halo, "<?= $this->session->userdata('nama_pemilih') ?>"! Silahkan pilih salah satu Kandidat di bawah <i class="bx bxs-edit-alt"></i></p>
                </div>
                <div class="row">
                    <?php
                    foreach ($kandidat as $data) {
                    ?>

                        <div class="col-lg-3 col-md-6 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                            <a id="detail_kandidat" data-bs-toggle="modal" data-bs-target="#detailModal" data-idkandidat="<?= $data->id_kandidat ?>" data-namaanggota="<?= $data->nama_anggota ?>" data-npm="<?= $data->npm_anggota ?>" data-kelas="<?= $data->kelas ?>" data-tahunmasuk="<?= $data->tahun_masuk ?>" data-email="<?= $data->email ?>" data-nokontak="<?= $data->nomor_kontak ?>" data-photokandidat="<?= $data->photo_kandidat ?>" data-nourut="<?= $data->nmr_urut ?>" data-motto="<?= $data->motto ?>" data-keterangan="<?= $data->keterangan ?>">
                                <div class="icon-box iconbox-blue">
                                    <div class="row">
                                        <div class="icon">
                                            <img src="<?= base_url('assets/img/kandidat/' . $data->photo_kandidat) ?>" class="img-fluid img-thumbnail rounded-circle" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h4>
                                            #<?= $data->nmr_urut ?>
                                        </h4>
                                        <h5><?= $data->nama_anggota ?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php } ?>

                </div>

            </div>
        </section><!-- End kandidat Section -->


        <!-- Modal Kandidat -->
        <section class="about">
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="judul" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="id_kandidat" id="id_kandidat">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="" class="img-fluid img-thumbnail" alt="" id="photo_kandidat">
                                    </div>
                                    <div class="col-lg-8 pt-4 pt-lg-0 content">
                                        <h3>#<span id="nourut"></span> <span id="namaanggota"></span></h3>
                                        <p class="fst-italic">
                                            "<span id="motto"></span>"
                                        </p>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <ul>
                                                    <li><i class="bi bi-chevron-right"></i> <strong>NPM:</strong> <span id="npm"></span></li>
                                                    <li><i class="bi bi-chevron-right"></i> <strong>Kelas:</strong> <span id="kelas"></span></li>
                                                    <li><i class="bi bi-chevron-right"></i> <strong>Tahun Masuk:</strong> <span id="tahunmasuk"></span></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <textarea name="inputketerangan" class="form-control" id="keterangan" rows="10" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                                <input type="submit" class="btn btn-primary btn-sm" name="pilih" value="Pilih">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Modal Kandidat -->


        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="<?= base_url('assets/pemilupage/') ?>vendor/purecounter/purecounter.js"></script>
        <script src="<?= base_url('assets/pemilupage/') ?>vendor/aos/aos.js"></script>
        <script src="<?= base_url('assets/pemilupage/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets/pemilupage/') ?>vendor/glightbox/js/glightbox.min.js"></script>
        <script src="<?= base_url('assets/pemilupage/') ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="<?= base_url('assets/pemilupage/') ?>vendor/swiper/swiper-bundle.min.js"></script>
        <script src="<?= base_url('assets/pemilupage/') ?>vendor/typed.js/typed.min.js"></script>
        <script src="<?= base_url('assets/pemilupage/') ?>vendor/waypoints/noframework.waypoints.js"></script>
        <script src="<?= base_url('assets/pemilupage/') ?>vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="<?= base_url('assets/pemilupage/') ?>js/main.js"></script>
        <script src="<?= base_url('assets/') ?>adminpage/vendor/jquery/jquery.min.js"></script>
        <script>
            // $(document).ready(function() {
            //     $(document).on('click', '#detail', function() {
            //         let id = $(this).data('idkandidat');
            //         let nama_kandidat = $(this).data('namakandidat');
            //         let npm = $(this).data('npm');
            //         let nomorUrut = $(this).data('nourut');
            //         let photo = $(this).data('photo');
            //         let keterangan = $(this).data('keterangan');

            //         $("#id_kandidat").val(id);
            //         $("#nama_kandidat").text(nama_kandidat);
            //         $("#npm").text(npm);
            //         $("#nomorUrut").text(nomorUrut);
            //         $("#photo").text(photo);
            //         $("#keterangan").text(keterangan);
            //     })
            // })

            $(document).on('click', '#detail_kandidat', function() {
                let id = $(this).data('idkandidat');
                let nourut = $(this).data('nourut');
                let nama_anggota = $(this).data('namaanggota');
                let npm = $(this).data('npm');
                let kelas = $(this).data('kelas');
                let tahunMasuk = $(this).data('tahunmasuk');
                let email = $(this).data('email');
                let photo = $(this).data('photokandidat');
                let nokontak = $(this).data('nokontak');
                let motto = $(this).data('motto');
                let ket = $(this).data('keterangan');

                $("#id_kandidat").val(id);
                $("#nourut").text(nourut);
                $("#namaanggota").text(nama_anggota);
                $("#npm").text(npm);
                $("#kelas").text(kelas);
                $("#tahunmasuk").text(tahunMasuk);
                $("#email").text(email);
                $("#photo_kandidat").attr("src", "<?= base_url('assets/img/kandidat/') ?>" + photo);
                $("#nokontak").text(nokontak);
                $("#motto").text(motto);
                $("#keterangan").val(ket);
            })
        </script>

</body>

</html>