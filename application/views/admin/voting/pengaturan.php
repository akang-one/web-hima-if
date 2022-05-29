<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan Voting</h1>
    </div>
    <?php if ($this->session->flashdata('msg')) : ?>
        <div class="alert alert-info alert-dismissible d-flex align-items-center fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                <use xlink:href="#info-fill" />
            </svg>
            <div><?= $this->session->flashdata('msg'); ?></div>
            <div><button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button></div>
        </div>
    <?php endif;  ?>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-7">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Pengaturan Voting</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Periode</th>
                                    <th>Nama Voting</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>Periode</td>
                                    <td>Nama Voting</td>
                                    <td>Tanggal Berakhir</td>
                                    <td>Status</td>
                                    <td></td>
                            </tfoot>
                            <tbody>
                                <?php
                                foreach ($pengaturan as $data) {
                                    $tgl = date('j-m-Y', strtotime($data->tgl_tutup));
                                ?>
                                    <tr>
                                        <td><?= $data->periode ?></td>
                                        <td><?= $data->nama_voting ?></td>
                                        <td><?= $tgl ?></td>
                                        <td class="text-center">
                                            <span class="badge <?= $data->status == 1 ? 'badge-success' : 'badge-danger' ?>">
                                                <?= $data->status == 1 ? 'berjalan' : 'tutup' ?></span>
                                        </td>
                                        <td>
                                            <div class="row justify-content-start">
                                                <div class="col-4">
                                                    <a href="<?= site_url('admin/mulai_voting/') . $data->id_voting ?>" class="btn btn-success btn-circle btn-sm" onclick="return confirm('Mulai Voting? Voting Akan berakhir pada  <?= $data->tgl_tutup ?>')">
                                                        <i class="fas fa-play"></i>
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="<?= site_url('admin/stop_voting/') . $data->id_voting ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Hentikan Voting?')">
                                                        <i class="fas fa-stop"></i>
                                                    </a>
                                                </div>
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

        <div class="col-lg-5">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Tambah Voting</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <?php
                            $years = date('Y');
                            ?>
                            <label for="periode" class="form-label">Periode <span style="color: red;">&#8270;</span></label>
                            <select class="form-select text-secondary" id="periode" name="inputperiode" required>
                                <option value="" selected>Klik Untuk Memilih</option>
                                <?php for ($y = 0; $y <= 2; $y++) { ?>
                                    <option value="<?= $years + $y ?>"><?= $years + $y ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="namavoting" class="form-label">Nama Voting <span style="color: red;">&#8270;</span></label>
                            <input type="text" name="inputnamavote" class="form-control" id="namavoting" placeholder="Nama Kegiatan Pemilihan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgltutup" class="form-label">Tanggal Tutup Voting <span style="color: red;">&#8270;</span></label>
                            <input type="date" name="inputtgltutup" class="form-control" id="tgltutup" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success" name="submit" value="Simpan">
                            <input type="reset" class="btn btn-warning" value="Reset">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->