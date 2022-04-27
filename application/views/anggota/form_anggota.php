<div class="p3 container-fluid">
    <h1>Data Anggota HIMA-IF</h1>
    <hr>

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
    <form action="" method="post">
        <table>
            <tr>
                <td>NPM</td>
                <td>: <input type="number" name="inputnpm" value="<?= $npm ?>"> </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="inputnama" value="<?= $nama ?>"> </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:
                    <select name="inputkelas">
                        <option value="">Pilih kelas...</option>
                        <option value="IF-A1" <?= ($kelas == 'IF-A1') ? 'selected' : '' ?>>IF-A1</option>
                        <option value="IF-A2" <?= ($kelas == 'IF-A2') ? 'selected' : '' ?>>IF-A2</option>
                        <option value="IF-B" <?= ($kelas == 'IF-B') ? 'selected' : '' ?>>IF-B</option>
                        <option value="IF-C" <?= ($kelas == 'IF-C') ? 'selected' : '' ?>>IF-C</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tahun Masuk</td>
                <td>: <input type="number" name="inputtahunmasuk" value="<?= $tahunmasuk ?>"> </td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>: <input type="email" name="inputemail" value="<?= $email ?>"> </td>
            </tr>
            <tr>
                <td>No. Kontak</td>
                <td>: <input type="text" name="inputkontak" value="<?= $kontak ?>"> </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="SIMPAN" name="submit">
                    <a href="<?= site_url('anggota')  ?>"><input type="button" name="cancel" value="CANCEL"></a>
                </td>
            </tr>
        </table>
    </form>
</div>