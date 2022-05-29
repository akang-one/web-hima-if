<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Voting</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/adminpage/') ?>css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-danger">

    <div class="container ">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 ">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">E-Voting HIMA-IF</h1>
                                    </div>
                                    <hr>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <h1 class="h4 text-danger mb-4">Mohon maaf!</h1>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h6 mb-4">Anda tida bisa melakukan voting karena tidak aktif.</h1>
                                    </div>
                                    <br>
                                    <br>
                                    <a href="<?= site_url('voting/logout_pemilih') ?>" class="btn btn-primary btn-block">
                                        Keluar
                                    </a>
                                    <hr>
                                    <div class="text-center">
                                        <p class="small">Silahkan tekan tombol Keluar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/adminpage/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/adminpage/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/adminpage/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>