<div class="p3 container-fluid">
    <h1>Data Kandidat</h1>
    <hr>

    <p><a href="<?= site_url('kandidat/add') ?>"><input type="button" class="btn btn-outline-primary" name="cancel" value="+Tambah"></a></p>
    <table class="table table-striped"">
        <thead>
            <tr>
                <th>#</th>
                <th>Nomor Urut</th>
                <th>Nama Kandidat</th>
                <th>Wakil (Jika ada)</th>
                <th>Photo</th>
                <th></th>
        </tr>
        </thead>
        <tbody>
            <?php
            foreach ($kandidat as $list) {
            ?>
                <tr>
                    <td></td>
                    <td><?= $list->nmr_urut ?></td>
                    <td><?= $list->nama_anggota ?></td>
                    <?php foreach ($wakil as $wa) { ?>
                    <td><?= $wa->nama_anggota ?></td>
                    <?php } ?>
                    <td><?= $list->photo ?></td>
                    <td>
                        <a href=" <?= site_url('kandidat/edit/') . $list->id_kandidat ?> " role=" button" class=" btn btn-warning btn-sm">Edit</a>
        <a href="<?= site_url('kandidat/delete/') . $list->id_kandidat ?>" role="button" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin? Data yang dihapus tidak bisa dikembalikan!')">Delete</a>
        </td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
</div>