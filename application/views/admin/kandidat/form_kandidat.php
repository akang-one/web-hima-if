<div class="container-fluid">
    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kandidat </h1>
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <!-- <a href="<?= site_url('admin/kandidat/') ?>" class="btn btn-success btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a> -->
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="inputvoting" value="">
                    <div class="card-body">
                        <?php
                        $vote = '';
                        $ketua = '';
                        $nourut = '';
                        $motto = '';
                        $keterangan = '';
                        $photo_k = 'default.png';

                        if (isset($kandidat)) {
                            $vote = $kandidat->id_voting;
                            $ketua = $kandidat->ketua;
                            $nourut = $kandidat->nmr_urut;
                            $motto = $kandidat->motto;
                            $keterangan = $kandidat->keterangan;
                            $photo_k = $kandidat->photo_kandidat;
                        }

                        ?>
                        <div class="row justify-content-center m-2">
                            <div class="col-3">
                                <div class="col-12">
                                    <input type="hidden" name="photokandidat" value="<?= $photo_k ?>">
                                    <img src="<?= base_url('assets/img/kandidat/') . $photo_k ?>" alt="" class="rounded img-fluid" id="photokandidat">
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
                                        <option value="">Pilih...</option>
                                        <?php foreach ($voting  as $v) { ?>
                                            <option value="<?= $v->id_voting ?>" <?= set_select('inputvoting', $v->id_voting, $vote == $v->id_voting ? TRUE : FALSE); ?>><?= $v->nama_voting . ' ' . $v->periode ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inputketua" class="form-label">Kandidat <span style="color: red;">&#8270;</span></label>
                                    <select name="inputketua" class="form-select" id="inputketua" required>
                                        <option value="">Pilih...</option>
                                        <?php foreach ($anggota  as $namaketua) { ?>
                                            <option value="<?= $namaketua->id_anggota ?>" <?= set_select('inputketua', $namaketua->id_anggota, $ketua == $namaketua->id_anggota ? TRUE : FALSE); ?>><?= $namaketua->nama_anggota ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inputnourut" class="form-label">Nomor Urut <span style="color: red;">&#8270;</span></label>
                                    <input type="number" class="form-control" id="inputnourut" name="inputnourut" value="<?= $nourut ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputmotto" class="form-label">Motto Hidup</label>
                                    <textarea name="inputmotto" class="form-control" id="inputmotto" rows="3"><?= $motto ?></textarea>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-12">
                                    <label for="inputketerangan" class="form-label">Keterangan <small>(isi dengan visi dan misi atau lainnya)</small></label>
                                    <textarea name="inputketerangan" class="form-control" id="inputketerangan" rows="10"><?= $keterangan ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <input type="submit" value="Simpan" name="submit" class="btn btn-primary me-md-2">
                            <input type="reset" value="Reset" class="btn btn-secondary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>