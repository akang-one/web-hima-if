<div class="p3 container-fluid">
    <h1>Data Kandidat Pemilu HIMA-IF</h1>
    <hr>

    <a href="<?= site_url('kandidat')  ?>"><input type="button" name="cancel" value="CANCEL" class="btn btn-primary"></a>
    <?php
    $ketua = '';
    $nourut = '';

    if (isset($kandidat)) {
        $ketua = $kandidat->ketua;
        $nourut = $kandidat->nmr_urut;
    }

    ?>
    <div class="container">
        <div class="row justify-content-center m-2">
            <div class="col-12 ">
                <div class="card w-50 p-4">
                    <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="inputketua" class="form-label">Kandidat</label>
                            <select name="inputketua" class="form-select" id="inputketua" required>
                                <option value="">Pilih...</option>
                                <?php foreach ($anggota  as $namaketua) { ?>
                                    <option value="<?= $namaketua->id_anggota ?>" <?= set_select('inputketua', $namaketua->id_anggota, $ketua == $namaketua->id_anggota ? TRUE : FALSE); ?>><?= $namaketua->nama_anggota ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputnourut" class="form-label">Nomor Urut</label>
                            <input type="number" class="form-control" id="inputnourut" name="inputnourut" value="<?= $nourut ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="inputphoto" class="form-label">Photo</label>
                            <input class="form-control" type="file" id="inputphoto" name="inputphoto">
                        </div>
                        <div class="col-12">
                            <input type="submit" value="SIMPAN" name="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col">
                <img src="" alt="">
            </div>
        </div>

    </div>
</div>