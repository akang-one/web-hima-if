<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kandidat <?php echo $nama_voting . " " . $periode ?></h1>
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
        <div class="col-lg-4">
            <!-- Basic Card Example -->
            <div class="card border-left-success shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Action</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Kandidat</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-mr-2">
                        </div>
                        <div class="col mr-2">
                            <p>
                                <small>Klik untuk menambahkan Kandidat</small><br>
                                <a id="tambah_kandidat" class="btn btn-success btn-icon-split btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                    <span class=" icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah</span>
                                </a>
                            </p>
                            <p>
                                <small>Kembali ke halaman Voting</small><br>
                                <a href="<?= site_url('admin/setting_voting/') ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>
                                    <span class="text">Kembali</span>
                                </a>
                            </p>
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
                            <p><a role="button" class=" btn btn-info btn-sm"><i class="fas fa-eye"></i></a> <small>Klik tombol ini untuk melihat detail Kandidat</small></p>
                            <p><a role="button" class=" btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> <small>Klik tombol ini untuk mengedit Kandidat</small></p>
                            <p><a role="button" class=" btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a> <small>Klik tombol ini untuk menghapus Kandidat</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <th>Nomor Urut</th>
                                    <th>Nama Kandidat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>Nomor Urut</td>
                                    <td>Nama Kandidat</td>
                                    <td></td>
                            </tfoot>
                            <tbody>
                                <?php
                                foreach ($kandidat as $list) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $list->nmr_urut ?></td>
                                        <td><?= $list->nama_anggota ?></td>
                                        <td style="width:7em;">
                                            <div class="row justify-content-start">
                                                <div class="btn-group" role="group">
                                                    <a id="detail_kandidat" role="button" class=" btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal" data-namaanggota="<?= $list->nama_anggota ?>" data-npm="<?= $list->npm_anggota ?>" data-kelas="<?= $list->kelas ?>" data-tahunmasuk="<?= $list->tahun_masuk ?>" data-email="<?= $list->email ?>" data-nokontak="<?= $list->nomor_kontak ?>" data-photokandidat="<?= $list->photo_kandidat ?>" data-nourut="<?= $list->nmr_urut ?>" data-motto="<?= $list->motto ?>" data-keterangan="<?= $list->keterangan ?>"><i class="fas fa-eye"></i></a>
                                                    <a id="edit_kandidat" role="button" class=" btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-idKandidat="<?= $list->id_kandidat ?>" data-idvoting="<?= $list->id_voting ?>" data-photo="<?= $list->photo_kandidat ?>" data-idanggota="<?= $list->id_anggota ?>" data-nama="<?= $list->nama_anggota ?>" data-nmrurut="<?= $list->nmr_urut ?>" data-motto="<?= $list->motto ?>" data-keterangan="<?= $list->keterangan ?>"><i class="fas fa-edit"></i></a>
                                                    <a id="delete_kandidat" role="button" class=" btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-idKandidat="<?= $list->id_kandidat ?>" data-idvoting="<?= $list->id_voting ?>"><i class="fas fa-trash-alt"></i></a>
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


<!-- Modal Tambah Kandidat -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="judul">Tambah Kandidat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('admin/add_kandidat/') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row justify-content-center m-2">
                        <div class="col-3">
                            <div class="col-12">
                                <input type="hidden" name="photokandidat" value="">
                                <img src="<?= base_url('assets/img/kandidat/') . 'default.png ' ?>" alt="" class="rounded img-fluid" id="photokandidat">
                            </div>
                            <div class="col-12">
                                <label for="inputphoto" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="inputphoto" name="inputphoto">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="col-12">
                                <label for="inputvoting" class="form-label">Untuk Voting <span style="color: red;">&#8270;</span></label>
                                <select name="inputvoting" class="form-select" id="inputvoting" required>
                                    <option value="<?= $id_voting ?>" selected><?= $nama_voting . ' ' . $periode ?></option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputketua" class="form-label">Kandidat <span style="color: red;">&#8270;</span></label>
                                <select name="inputketua" class="form-select" id="inputketua">
                                    <option value="">Pilih...</option>
                                    <?php foreach ($anggota  as $namaketua) { ?>
                                        <option value="<?= $namaketua->id_anggota ?>"><?= $namaketua->nama_anggota ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputnourut" class="form-label">Nomor Urut <span style="color: red;">&#8270;</span></label>
                                <input type="number" class="form-control" id="inputnourut" name="inputnourut" value="" required>
                            </div>
                            <div class="col-12">
                                <label for="inputmotto" class="form-label">Motto Hidup</label>
                                <textarea name="inputmotto" class="form-control" id="inputmotto" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-12">
                                <label for="inputketerangan" class="form-label">Keterangan <p><small>(isi dengan visi dan misi atau lainnya)</small></p></label>
                                <textarea name="inputketerangan" class="form-control" id="inputketerangan" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
                    <input type="reset" value="Reset" class="btn btn-secondary">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Kandidat -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="judul">Edit Kandidat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('admin/edit_kandidat/') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row justify-content-center m-2">
                        <div class="col-3">
                            <div class="col-12">
                                <input type="hidden" name="photokandidat" id="edit_photolama">
                                <input type="hidden" name="id_anggota" id="edit_idanggota">
                                <input type="hidden" name="id_kandidat" id="edit_idKandidat">
                                <input type="hidden" name="id_voting" id="edit_idvoting">
                                <img src="" alt="" class="rounded img-fluid" id="edit_photokandidat">
                            </div>
                            <div class="col-12">
                                <label for="inputphoto" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="inputphoto" name="inputphoto">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="col-12">
                                <label for="voting" class="form-label">Untuk Voting <span style="color: red;">&#8270;</span></label>
                                <select name="inputvoting" class="form-select" id="inputvoting" required>
                                    <option value="<?= $id_voting ?>" selected><?= $nama_voting . ' ' . $periode ?></option>
                                </select>
                                <!-- <input type="text" class="form-control" id="voting" value="<?= $nama_voting . ' ' . $periode ?>" disabled> -->
                            </div>
                            <div class="col-12">
                                <label for="edit_nama" class="form-label">Kandidat <span style="color: red;">&#8270;</span></label>
                                <input type="text" class="form-control" id="edit_nama">
                            </div>
                            <div class="col-12">
                                <label for="edit_nmrurut" class="form-label">Nomor Urut <span style="color: red;">&#8270;</span></label>
                                <input type="number" class="form-control" id="edit_nmrurut" name="inputnourut" required>
                            </div>
                            <div class="col-12">
                                <label for="edit_motto" class="form-label">Motto Hidup</label>
                                <textarea name="inputmotto" class="form-control" id="edit_motto" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-12">
                                <label for="edit_keterangan" class="form-label">Keterangan <p><small>(isi dengan visi dan misi atau lainnya)</small></p></label>
                                <textarea name="inputketerangan" class="form-control" id="edit_keterangan" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= site_url('admin/delete_kandidat') ?>" method="post">
            <input type="hidden" name="id_kandidat" id="del_idKandidat">
            <input type="hidden" name="id_voting" id="idvoting">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Data yang dihapus tidak bisa dikembalikan!</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                </div>
            </div>
        </form>
    </div>
</div>