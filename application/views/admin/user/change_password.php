<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Operator</h1>
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Change Password</h6>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <?php if ($this->session->flashdata('msg')) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h1 class="h6"><?= $this->session->flashdata('msg'); ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;  ?>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div style="color:red;"><?= validation_errors() ?></div>
                                <div class="text-center">
                                    <p class="mb-4">Perlu memasukan password lama untuk verfikasi</p>
                                </div>
                                <form class="user" action="" method="POST">
                                    <div class="form-group">
                                        <input type="password" id="passwordlama" name="passwordlama" class="form-control form-control-user" placeholder="Password Lama" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="passwordbaru" name="passwordbaru" class="form-control form-control-user" placeholder="Password Baru" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="passwordbaru2" name="passwordbaru2" class="form-control form-control-user" placeholder="Ulangi Password Baru" required>
                                    </div>
                                    <hr>
                                    <input type="submit" name="resetpass" value="Reset Password" class="btn btn-primary btn-user btn-block">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>