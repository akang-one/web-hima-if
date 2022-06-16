<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Anggota HIMA-IF</h1>
    <div class="row">
        <div class="col-lg-4">
            <!-- Basic Card Example -->
            <div class="card border-left-success shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Action</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Form Data Anggota</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-edit fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-mr-2">
                            <p><small>Form Untuk Tambah / Edit Anggota</small></p>
                        </div>
                        <div class="col-mr-2">
                            <a href="<?= site_url('admin/anggota')  ?>" class="btn btn-secondary btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Form Data Anggota</h6>
                </div>
                <?php
                $npm = '';
                $nama = '';
                $kelas = '';
                $tahunmasuk = '';
                $email = '';
                $kontak = '';

                if (isset($anggota)) {
                    $npm = $anggota->npm_anggota;
                    $nama = $anggota->nama_anggota;
                    $kelas = $anggota->kelas;
                    $tahunmasuk = $anggota->tahun_masuk;
                    $email = $anggota->email;
                    $kontak = $anggota->nomor_kontak;
                }

                ?>
                <div class="card-body">
                    <div style="color:red;"><?= validation_errors() ?></div>
                    <div class="row justify-content-center m-2">
                        <div class="col-12 ">
                            <form class="row g-3" action="" method="POST">
                                <div class="col-12">
                                    <label for="inputnpm" class="form-label">NPM <span style="color: red;">&#8270;</span></label>
                                    <input type="text" name="inputnpm" id="inputnpm" class="form-control" value="<?= $npm ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputnama" class="form-label">Nama <span style="color: red;">&#8270;</span></label>
                                    <input type="text" class="form-control" id="inputnama" name="inputnama" value="<?= $nama ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputtahun" class="form-label">Tahun Masuk <span style="color: red;">&#8270;</span></label>
                                    <input type="text" class="form-control" id="inputtahun" name="inputtahunmasuk" value="<?= $tahunmasuk ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputkelas" class="form-label">Kelas <span style="color: red;">&#8270;</span></label>
                                    <select name="inputkelas" class="form-select" id="inputkelas" required>
                                        <option value="">Pilih kelas...</option>
                                        <option value="IF-A1" <?= ($kelas == 'IF-A1') ? 'selected' : '' ?>>IF-A1</option>
                                        <option value="IF-A2" <?= ($kelas == 'IF-A2') ? 'selected' : '' ?>>IF-A2</option>
                                        <option value="IF-B" <?= ($kelas == 'IF-B') ? 'selected' : '' ?>>IF-B</option>
                                        <option value="IF-C" <?= ($kelas == 'IF-C') ? 'selected' : '' ?>>IF-C</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputemail" class="form-label">Email <span style="color: red;">&#8270;</span></label>
                                    <input type="email" class="form-control" id="inputemail" name="inputemail" value="<?= $email ?>" placeholder="example@exm.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputkontak" class="form-label">Nomor Kontak <span style="color: red;">&#8270;</span></label>
                                    <input type="text" class="form-control" id="inputkontak" name="inputkontak" value="<?= $kontak ?>" required>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <input type="submit" value="Simpan" name="submit" class="btn btn-primary me-md-2">
                                    <input type="reset" value="Reset" class="btn btn-warning">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>