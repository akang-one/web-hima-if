<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pemilih</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-4">
            <!-- Basic Card Example -->
            <div class="card border-left-success shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <p>Data Pemilih</p>
                        </div>
                        <div class="col mr-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Pemilih</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td>NPM</td>
                                    <td>Nama</td>
                                    <td>Kelas</td>
                                    <td>Action</td>
                            </tfoot>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($pemilih as $list) {
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $list->npm_anggota ?></td>
                                        <td><?= $list->nama_anggota ?></td>
                                        <td><?= $list->kelas ?></td>
                                        <td>
                                            <div class="col mr-2">
                                                <a href=" <?= site_url('admin/resetpass_pemilih/') . $list->id_pemilih ?>" role="button" class=" btn btn-warning btn-icon-split btn-sm" onclick="return confirm('Ingin me-reset password?')">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-key"></i>
                                                    </span>
                                                    <span class="text">Reset Password</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>