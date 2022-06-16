<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Hadir</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-4">
            <!-- Basic Card Example -->
            <div class="card border-left-success shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Action</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Kehadiran</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-12">
                            <p><small>Pilih voting yang ingin ditampilkan</small></p>
                        </div>
                        <div class="col mr-2">
                            <form action="" method="post">
                                <div class="input-group">
                                    <select class="form-select" name="voting">
                                        <option selected>Choose...</option>
                                        <?php foreach ($voting as $list) { ?>
                                            <option value="<?= $list->id_voting ?>"><?= $list->nama_voting ?> <?= $list->periode ?></option>
                                        <?php } ?>
                                    </select>
                                    <input class="btn btn-outline-success" type="submit" name="filter" value="Cari"></input>
                                </div>
                            </form>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Daftar Hadir <span class="text-dark"> <?= $this->session->userdata('nama_voting') ?> <?= $this->session->userdata('periode') ?></span></h6>
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
                                    <th>Status</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td>NPM</td>
                                    <td>Nama</td>
                                    <td>Kelas</td>
                                    <td>Status</td>
                                    <td>Waktu</td>
                            </tfoot>
                            <tbody>
                                <?php
                                if (isset($suara)) {
                                    $i = 1;
                                    foreach ($suara as $data) {
                                ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $data->npm_anggota ?></td>
                                            <td><?= $data->nama_anggota ?></td>
                                            <td><?= $data->kelas ?></td>
                                            <td class="text-center">
                                                <span class="badge <?= $data->waktu != NULL ? 'badge-success' : 'badge-danger' ?>">
                                                    <?= $data->waktu != NULL ? 'hadir' : 'tidak hadir' ?>
                                                </span>
                                            </td>
                                            <td><?= $data->waktu ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>