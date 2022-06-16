<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Anggota HIMA-IF</h1>
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
        <div class="col-lg-4">
            <!-- Basic Card Example -->
            <div class="card border-left-success shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Action</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Anggota</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-mr-2">
                            <p><small>Klik tombol tambah untuk menambahkan Anggota <br>
                                    <i> Untuk menambahkan photo klik tombol detail</i></small></p>
                        </div>
                        <div class="col mr-2">
                            <a href="<?= site_url('admin/add_anggota') ?>" class="btn btn-success btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah</span>
                            </a>
                        </div>
                        <div class="col-mr-2">
                            <p></p>
                        </div>
                    </div>

                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tooltip</div>
                        </div>
                        <div class="col-mr-2">
                            <p><a role="button" class=" btn btn-info btn-sm"><i class="fas fa-eye"></i></a> <small>Klik tombol ini untuk melihat detail Anggota</small></p>
                            <p><a role="button" class=" btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> <small>Klik tombol ini untuk mengedit Anggota</small></p>
                            <p><a role="button" class=" btn btn-success btn-sm"><i class="fas fa-play-circle"></i></a> <small>Klik tombol ini untuk mengaktifkan Anggota</small></p>
                            <p><a role="button" class=" btn btn-danger btn-sm"><i class="fas fa-ban"></i></a> <small>Klik tombol ini untuk memblokir Anggota</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Anggota</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive fs-6">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td>NPM</td>
                                    <td>Nama</td>
                                    <td>Kelas</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($anggota as $list) {
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $list->npm_anggota ?></td>
                                        <td><?= $list->nama_anggota ?></td>
                                        <td><?= $list->kelas ?></td>
                                        <td class="text-center">
                                            <span class="badge <?= $list->status_aktif == 1 ? 'badge-success' : 'badge-danger' ?>">
                                                <?= $list->status_aktif == 1 ? 'aktif' : 'non-aktif' ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="row justify-content-start">
                                                <div class="col-auto">
                                                    <a id="detail_anggota" role="button" class=" btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="<?= $list->id_anggota ?>" data-namaanggota="<?= $list->nama_anggota ?>" data-npm="<?= $list->npm_anggota ?>" data-kelas="<?= $list->kelas ?>" data-tahunmasuk="<?= $list->tahun_masuk ?>" data-email="<?= $list->email ?>" data-nokontak="<?= $list->nomor_kontak ?>" data-photo="<?= $list->photo ?>"><i class="fas fa-eye"></i></a>
                                                </div>
                                                <div class="col-auto">
                                                    <a href=" <?= site_url('admin/edit_anggota/') . $list->id_anggota ?>" role="button" class=" btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                </div>
                                                <div class="col-auto">
                                                    <?php if ($list->status_aktif == 1) { ?>
                                                        <a href="<?= site_url('admin/disaktif_anggota/') . $list->id_anggota ?>" role="button" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin ingin men-nonaktifkan?')"><i class="fas fa-ban"></i></a>
                                                    <?php } else { ?>
                                                        <a href="<?= site_url('admin/aktif_anggota/') . $list->id_anggota ?>" role="button" class=" btn btn-success btn-sm" onclick="return confirm('Apakah Anda Yakin ingin aktifkan?')"><i class="fas fa-play-circle"></i></a>
                                                    <?php } ?>
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

    </div>
</div>

<!-- Modal Detail Anggota -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="judul">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <img src="" alt="User Image" id="photo" width="200px" class="rounded" style="margin-bottom: 25px;">
                        <form action="<?= site_url('admin/changephoto/') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_anggota" id="id_anggota">
                            <input type="hidden" name="photolama" id="photolama">
                            <label for="gantiphoto" class="form-label">Ganti Photo</label>
                            <div class="input-group">
                                <input type="file" name="gantiphoto" class="form-control form-control-sm" id="gantiphoto" aria-describedby="uploadphoto" aria-label="Upload" required>
                                <input class="btn btn-outline-success btn-sm" type="submit" id="uploadphoto" value="Upload" name="uploadfile"></input>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-borderless">
                            <tr>
                                <td>NPM </td>
                                <td>
                                    : <span id="npm"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama </td>
                                <td>
                                    : <span id="namaanggota"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kelas </td>
                                <td>
                                    : <span id="kelas"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Tahun Masuk </td>
                                <td>
                                    : <span id="tahunmasuk"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Email </td>
                                <td>
                                    : <span id="email"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomo Kontak </td>
                                <td>
                                    : <span id="nokontak"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>