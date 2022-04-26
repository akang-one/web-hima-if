    <h1>Data Anggota HIMA-IF</h1>
    <hr>

    <p><a href="<?= site_url('anggota/add') ?>"><input type="button" name="cancel" value="Tambah Anggota"></a></p>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tahun Masuk</th>
                <th>E-mail</th>
                <th>Nomor Kontak</th>
                <th>Photo</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

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
                    <td><?= $list->tahun_masuk ?></td>
                    <td><?= $list->email ?></td>
                    <td><?= $list->nomor_kontak ?></td>
                    <td><?= $list->photo ?></td>
                    <td><a href="<?= site_url('anggota/edit/') . $list->id_anggota ?>">Edit</a></td>
                    <td><a href="<?= site_url('anggota/delete/') . $list->id_anggota ?>" onclick="return confirm('Apakah Anda Yakin? Data yang dihapus tidak bisa dikembalikan!')">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>