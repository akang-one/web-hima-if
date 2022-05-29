<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kandidat</h1>
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
        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Kandidat</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Voting</th>
                                    <th>Nomor Urut</th>
                                    <th>Nama Kandidat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>Voting</td>
                                    <td>Nomor Urut</td>
                                    <td>Nama Kandidat</td>
                                    <td></td>
                            </tfoot>
                            <tbody>
                                <?php
                                foreach ($kandidat as $list) {
                                ?>
                                    <tr>
                                        <td><?= $list->nama_voting . " " . $list->periode ?> </td>
                                        <td class="text-center"><?= $list->nmr_urut ?></td>
                                        <td><?= $list->nama_anggota ?></td>
                                        <td>
                                            <div class="row justify-content-start">
                                                <div class="col-3">
                                                    <a id="detail_kandidat" role="button" class=" btn btn-info btn-sm" role="button" class=" btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal" data-namaanggota="<?= $list->nama_anggota ?>" data-npm="<?= $list->npm_anggota ?>" data-kelas="<?= $list->kelas ?>" data-tahunmasuk="<?= $list->tahun_masuk ?>" data-email="<?= $list->email ?>" data-nokontak="<?= $list->nomor_kontak ?>" data-photokandidat="<?= $list->photo_kandidat ?>" data-nourut="<?= $list->nmr_urut ?>" data-motto="<?= $list->motto ?>" data-keterangan="<?= $list->keterangan ?>"><i class="fas fa-eye"></i></a>
                                                </div>
                                                <div class="col-3">
                                                    <a href="<?= site_url('admin/edit_kandidat/') . $list->id_kandidat ?>" role="button" class=" btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                </div>
                                                <div class="col-3">
                                                    <a href="<?= site_url('admin/delete_kandidat/') . $list->id_kandidat ?>" role="button" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin? Data yang dihapus tidak bisa dikembalikan!')"><i class="fas fa-trash-alt"></i></a>
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

        <div class="col-lg-4">
            <!-- Basic Card Example -->
            <div class="card border-left-success shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <p>Klik tombol tambah untuk menambahkan kandidat</p>
                        </div>
                        <div class="col mr-2">
                            <a href="<?= site_url('admin/add_kandidat') ?>" class="btn btn-success btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Detail Kandidat -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="judul">Detail Kandidat #<span id="nourut"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <img src="" alt="User Image" id="photo_kandidat" class="rounded img-fluid" style="margin-bottom: 25px;">
                    </div>
                    <div class="col-sm-4">
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
                    <div class="col-sm-4">
                        <label for="motto" class="form-label">Motto Hidup</label>
                        <textarea class="form-control" id="motto" rows="2" disabled></textarea>
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="10" disabled></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>