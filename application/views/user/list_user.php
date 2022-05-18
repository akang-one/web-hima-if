<div class="p3 container-fluid">
    <h1>Data Admin HIMA-IF</h1>
    <hr>

    <p><a href="<?= site_url('user/add') ?>"><input type="button" class="btn btn-primary" name="cancel" value="+ Tambah"></a></p>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>username</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $i = 1;
            foreach ($user as $list) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $list->username ?></td>
                    <td><?= $list->nama_user ?></td>
                    <td>
                        <?php if ($list->user_role == '0') {
                            echo "Admin";
                        } elseif ($list->user_role == '1') {
                            echo "Ketua";
                        } else {
                            echo "Tim";
                        }
                        ?>
                    </td>
                    <td><a href="<?= site_url('user/edit/') . $list->id_user ?>">Edit</a></td>
                    <td><a href="<?= site_url('user/delete/') . $list->id_user ?>" onclick="return confirm('Apakah Anda Yakin? Data yang dihapus tidak bisa dikembalikan!')">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>