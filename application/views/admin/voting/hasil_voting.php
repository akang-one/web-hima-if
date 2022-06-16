<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hasil Voting</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <div class="col-xl-4 col-lg-5">
            <!--  Card Action -->
            <div class="card mb-4 border-left-success shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Action</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Hasil Voting</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-12">
                            <p><small>Pilih voting yang ingin ditampilkan</small></p>
                        </div>
                        <div class="col mr-2">
                            <form action="" method="post">
                                <div class="input-group">
                                    <select class="form-select" name="voting">
                                        <option selected>Choose...</option>
                                        <?php foreach ($voting as $list) { ?>
                                            <option value="<?= $list->id_voting ?>"><?= $list->nama_voting ?> <?= $list->periode ?></option>
                                        <?php } ?>
                                    </select>
                                    <input class="btn btn-outline-success" type="submit" name="filter" value="Cari"></input>
                                </div>
                            </form>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $this->session->userdata('nama_voting') ?> <?= $this->session->userdata('periode') ?></h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="ChartHasil"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bar Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $this->session->userdata('nama_voting') ?> <?= $this->session->userdata('periode') ?></h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="ChartHasil2"></canvas>
                    </div>
                </div>
            </div>

            <!-- Card Table Hasil Voting -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Hasil Voting <span class="text-dark"> <?= $this->session->userdata('nama_voting') ?> <?= $this->session->userdata('periode') ?></span></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Urut</th>
                                    <th>Nama Kandidat</th>
                                    <th>Total Suara</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td>Nomor Urut</td>
                                    <td>Nama Kandidat</td>
                                    <td>Total Suara</td>
                            </tfoot>
                            <tbody>
                                <?php
                                if (isset($hasil)) {
                                    $i = 1;
                                    foreach ($hasil as $data) {
                                ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $data->nmr_urut ?></td>
                                            <td><?= $data->nama_anggota ?></td>
                                            <td><?= $data->total ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>