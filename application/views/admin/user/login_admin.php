<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Voting</title>

    <!-- link untuk Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/bootstrap.css">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/adminpage/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/adminpage/') ?>css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container ">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 ">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login2-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php if ($this->session->flashdata('msg')) : ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <h1 class="h6"><?= $this->session->flashdata('msg'); ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif;  ?>

                                    <div style="color:red;"><?= validation_errors() ?></div>
                                    <form action="" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                                        </div>
                                        <input type="submit" value="Login" name="login" class="btn btn-success btn-user btn-block">
                                    </form>
                                    <hr>
                                    <br>
                                    <div class="text-center">
                                        <p class="small">Silahkan masukan Username dan Password</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="small">Untuk masuk ke Menu</p>
                                    </div>
                                    <div class="form-group">
                                        <a href="<?= base_url() ?>" class="btn btn-warning btn-user btn-block">Kembali ke Halaman Utama</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Boostrap -->
    <script src="<?= base_url('assets/') ?>dist/js/bootstrap.bundle.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/adminpage/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/adminpage/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/adminpage/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/adminpage/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>