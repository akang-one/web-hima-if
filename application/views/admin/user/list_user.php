<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Operator</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Operator</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>username</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td>username</td>
                                    <td>Nama</td>
                                    <td>Role</td>
                                    <td>Action</td>
                            </tfoot>
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
                                        <td>
                                            <a href="<?= site_url('user/reset_password/') . $list->id_user ?>" role="button" class=" btn btn-secondary btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin me-reset password?')"><i class="fas fa-key"></i></a>
                                            <a href="<?= site_url('user/edit/') . $list->id_user ?>" role="button" class=" btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="<?= site_url('user/delete/') . $list->id_user ?>" role="button" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin? Data yang dihapus tidak bisa dikembalikan!')"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Basic Card Example -->
            <div class="card border-left-success shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <p>Klik tombol tambah untuk menambahkan Operator</p>
                        </div>
                        <div class="col mr-2">
                            <a href="<?= site_url('user/add') ?>" class="btn btn-success btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>