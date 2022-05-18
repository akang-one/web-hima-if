<div class="p3 container-fluid">
    <h1>Data Anggota HIMA-IF</h1>
    <hr>

    <p><a href="<?= site_url('anggota/add') ?>"><input type="button" class="btn btn-outline-primary" name="cancel" value="+Tambah"></a></p>
    <table class="table table-striped"">
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
                <th>Action</th>
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
                    <td>
                        <a href=" <?= site_url('anggota/edit/') . $list->id_anggota ?>" role="button" class=" btn btn-warning btn-sm">Edit</a>
        <a href="<?= site_url('anggota/delete/') . $list->id_anggota ?>" role="button" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin? Data yang dihapus tidak bisa dikembalikan!')">Delete</a>
        </td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
</div>