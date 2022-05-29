<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Operator</h1>
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <a href="<?= site_url('user')  ?>" class="btn btn-success btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                </div>
                <div class="card-body">
                    <?php
                    $username = '';
                    $nama = '';
                    $role = '';

                    if (isset($user)) {
                        $username = $user->username;
                        $nama = $user->nama_user;
                        $role = $user->user_role;
                    }

                    ?>
                    <div class="row justify-content-center m-2">
                        <div class="col-12 ">
                            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label for="inputusername" class="form-label">Username <span style="color: red;">&#8270;</span></label>
                                    <input type="text" class="form-control" id="inputusername" name="inputusername" value="<?= $username ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputnamauser" class="form-label">Nama <span style="color: red;">&#8270;</span></label>
                                    <input type="text" class="form-control" id="inputnamauser" name="inputnamauser" value="<?= $nama ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputrole" class="form-label">Role <span style="color: red;">&#8270;</span></label>
                                    <select name="inputrole" class="form-select" id="inputrole" required>
                                        <option value="">Pilih ...</option>
                                        <option value="0" <?= ($role == '0') ? 'selected' : '' ?>>Admin</option>
                                        <option value="1" <?= ($role == '1') ? 'selected' : '' ?>>Ketua Panitia</option>
                                        <option value="2" <?= ($role == '2') ? 'selected' : '' ?>>Tim</option>
                                    </select>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <input type="submit" value="Simpan" name="submit" class="btn btn-primary me-md-2">
                                    <input type="reset" value="Reset" class="btn btn-secondary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>