<div class="p3 container-fluid">
    <h1>Data Kandidat</h1>
    <hr>

    <p><a href="<?= site_url('anggota/add') ?>"><input type="button" class="btn btn-outline-primary" name="cancel" value="+Tambah"></a></p>
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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href=" " role=" button" class=" btn btn-warning btn-sm">Edit</a>
        <a href="" role="button" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin? Data yang dihapus tidak bisa dikembalikan!')">Delete</a>
        </td>
        </tr>
        </tbody>
    </table>
</div>