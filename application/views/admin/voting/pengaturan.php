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
        <div class="col-lg-5">
            <!-- Basic Card Example -->
            <div class="card mb-2 border-left-success shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Tooltip</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cogs fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-mr-2">
                            <p><small>Untuk tambah Voting pada Card </small><span class="text-success"><b>Tambah Voting</b></span></p>
                        </div>
                        <div class="col-mr-2">
                            <p>
                                <a class="btn btn-info btn-sm">
                                    <i class="fas fa-user-tie"></i>
                                    <span class="text">Kandidat</span>
                                </a>
                                <small>Klik tombol ini untuk melihat Kandidat pada Voting</small>
                            </p>
                            <p>
                                <a class="btn btn-warning btn-sm">
                                    <i class="fas fa-calendar-plus"></i>
                                    <span class="text">Perpanjangan</span>
                                </a>
                                <small>Klik tombol ini untuk merubah tanggal tutup Voting</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Tambah Voting</h6>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('admin/add_voting/') ?>" method="post">
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
                            <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                            <input type="reset" class="btn btn-warning" value="Reset">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Voting</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Periode</th>
                                    <th>Nama Voting</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Kandidat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>Periode</td>
                                    <td>Nama Voting</td>
                                    <td>Tanggal Berakhir</td>
                                    <td>Kandidat</td>
                                    <td></td>
                            </tfoot>
                            <tbody>
                                <?php
                                foreach ($pengaturan as $data) {
                                    $tgl = date('d-m-Y', strtotime($data->tgl_tutup));
                                ?>
                                    <tr>
                                        <td><?= $data->periode ?></td>
                                        <td><?= $data->nama_voting ?></td>
                                        <td><?= $tgl ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('admin/kandidat/') . $data->id_voting ?>" class="btn btn-info btn-sm">
                                                <i class="fas fa-user-tie"></i>
                                                <span class="text">Kandidat</span>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-warning" id="waktuVoting" role="button" class=" btn btn-danger btn-sm" data-toggle="modal" data-target="#perpanjang" data-id="<?= $data->id_voting ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-calendar-plus"></i>
                                                </span>
                                                <span class="text">Perpanjangan</span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">

        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- Perpanjangan Modal -->
<div class="modal fade" id="perpanjang" tabindex="-1" role="dialog" aria-labelledby="labelPerpanjangan" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= site_url('admin/perpanjang_voting/') ?>" method="post">
            <input type="hidden" name="id_voting" id="waktu_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelPerpanjangan">Perpanjangan Voting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="date" name="perpanjangVoting" id="" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>