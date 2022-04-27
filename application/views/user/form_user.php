<div class="p3 container-fluid">
    <h1>Data User HIMA-IF</h1>
    <hr>
    <a href="<?= site_url('user')  ?>"><input type="button" name="cancel" value="<-- Kembali ke Data Admin"></a>
    <?php
    $username = '';
    $nama = '';
    $role = '';


    if (isset($user)) {
        $username = $user->username;
        $nama = $user->nama_user;
        $role = $user->user_role;
    }

    ?>

    <form action="" method="post">
        <table>
            <tr>
                <td><input type="text" name="inputusername" value="<?= $username ?>" placeholder="Username"> </td>
            </tr>
            <tr>
                <td><input type="text" name="inputnamauser" value="<?= $nama ?>" placeholder="Nama"> </td>
            </tr>
            <tr>
                <td>
                    <select name="inputrole">
                        <option value="">--Pilih salah satu--</option>
                        <option value="0" <?= ($role == '0') ? 'selected' : '' ?>>Admin</option>
                        <option value="1" <?= ($role == '1') ? 'selected' : '' ?>>Ketua Panitia</option>
                        <option value="2" <?= ($role == '2') ? 'selected' : '' ?>>Tim</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="SIMPAN" name="submit">
                </td>
            </tr>
        </table>
    </form>
</div>