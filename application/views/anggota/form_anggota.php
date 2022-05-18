<div class="p3 container-fluid">
    <h1>Data Anggota HIMA-IF</h1>
    <hr>

    <a href="<?= site_url('anggota')  ?>"><input type="button" name="cancel" value="CANCEL" class="btn btn-primary"></a>
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
    <div class="container">
        <div class="row justify-content-center m-2">
            <div class="col-12 ">
                <div class="card w-50 p-4">
                    <form class="row g-3" action="" method="POST">
                        <div class="col-12">
                            <label for="inputnpm" class="form-label">NPM</label>
                            <input type="number" name="inputnpm" id="inputnpm" class="form-control" value="<?= $npm ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="inputnama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="inputnama" name="inputnama" value="<?= $nama ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputtahun" class="form-label">Tahun Masuk</label>
                            <input type="number" class="form-control" id="inputtahun" name="inputtahunmasuk" value="<?= $tahunmasuk ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputkelas" class="form-label">Kelas</label>
                            <select name="inputkelas" class="form-select" id="inputkelas" required>
                                <option value="">Pilih kelas...</option>
                                <option value="IF-A1" <?= ($kelas == 'IF-A1') ? 'selected' : '' ?>>IF-A1</option>
                                <option value="IF-A2" <?= ($kelas == 'IF-A2') ? 'selected' : '' ?>>IF-A2</option>
                                <option value="IF-B" <?= ($kelas == 'IF-B') ? 'selected' : '' ?>>IF-B</option>
                                <option value="IF-C" <?= ($kelas == 'IF-C') ? 'selected' : '' ?>>IF-C</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputemail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputemail" name="inputemail" value="<?= $email ?>" placeholder="example@exm.com" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputkontak" class="form-label">Nomor Kontak</label>
                            <input type="text" class="form-control" id="inputkontak" name="inputkontak" value="<?= $kontak ?>" required>
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