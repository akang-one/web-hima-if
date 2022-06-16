</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; HIMA - IF <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= site_url('user/logout_admin') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- Boostrap -->
<script src="<?= base_url('assets/') ?>dist/js/bootstrap.bundle.js"></script>

<!-- Template Webpage JS File -->
<script src="<?= base_url('assets/') ?>webpage/js/main.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>adminpage/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>adminpage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>adminpage/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>adminpage/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>adminpage/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/') ?>adminpage/vendor/chart.js/Chart.bundle.min.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>adminpage/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>adminpage/vendor/datatables/dataTables.bootstrap4.min.js"></script>



<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>adminpage/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/') ?>adminpage/js/demo/chart-pie-demo.js"></script>
<!-- <script src="<?= base_url('assets/') ?>adminpage/js/chart-hasil-voting.js"></script> -->
<script src="<?= base_url('assets/') ?>adminpage/js/demo/datatables-demo.js"></script>

<script>
    $(document).on('click', '#waktuVoting', function() {
        let id = $(this).data('id');
        $("#waktu_id").val(id);
    });

    $(document).on('click', '#detail_anggota', function() {
        let id = $(this).data('id');
        let nama_anggota = $(this).data('namaanggota');
        let npm = $(this).data('npm');
        let kelas = $(this).data('kelas');
        let tahunMasuk = $(this).data('tahunmasuk');
        let email = $(this).data('email');
        let photo = $(this).data('photo');
        let nokontak = $(this).data('nokontak');

        $("#id_anggota").val(id);
        $("#namaanggota").text(nama_anggota);
        $("#npm").text(npm);
        $("#kelas").text(kelas);
        $("#tahunmasuk").text(tahunMasuk);
        $("#email").text(email);
        $("#photolama").val(photo);
        $("#photo").attr("src", "<?= base_url('assets/img/anggota/') ?>" + photo);
        $("#nokontak").text(nokontak);
    });

    $(document).on('click', '#edit_kandidat', function() {
        let id = $(this).data('idkandidat');
        let idvoting = $(this).data('idvoting');
        let photo = $(this).data('photo');
        let idanggota = $(this).data('idanggota');
        let nama = $(this).data('nama');
        let nmrurut = $(this).data('nmrurut');
        let motto = $(this).data('motto');
        let ket = $(this).data('keterangan');

        $("#edit_idKandidat").val(id);
        $("#edit_idvoting").val(idvoting);
        $("#edit_photolama").val(photo);
        $("#edit_photokandidat").attr("src", "<?= base_url('assets/img/kandidat/') ?>" + photo);
        $("#edit_idanggota").val(idanggota);
        $("#edit_nama").val(nama);
        $("#edit_nmrurut").val(nmrurut);
        $("#edit_motto").val(motto);
        $("#edit_keterangan").val(ket);
    });

    $(document).on('click', '#delete_kandidat', function() {
        let id = $(this).data('idkandidat');
        let idvoting = $(this).data('idvoting');

        $("#del_idKandidat").val(id);
        $("#idvoting").val(idvoting);
    });

    $(document).on('click', '#detail_kandidat', function() {
        let nourut = $(this).data('nourut');
        let nama_anggota = $(this).data('namaanggota');
        let npm = $(this).data('npm');
        let kelas = $(this).data('kelas');
        let tahunMasuk = $(this).data('tahunmasuk');
        let email = $(this).data('email');
        let photo = $(this).data('photokandidat');
        let nokontak = $(this).data('nokontak');
        let motto = $(this).data('motto');
        let ket = $(this).data('keterangan');

        $("#nourut").text(nourut);
        $("#namaanggota").text(nama_anggota);
        $("#npm").text(npm);
        $("#kelas").text(kelas);
        $("#tahunmasuk").text(tahunMasuk);
        $("#email").text(email);
        $("#photo_kandidat").attr("src", "<?= base_url('assets/img/kandidat/') ?>" + photo);
        $("#nokontak").text(nokontak);
        $("#motto").val(motto);
        $("#keterangan").val(ket);
    });

    <?php if (isset($hasil)) { ?>
        var hV = document.getElementById('ChartHasil');
        var namaKandidat = [];
        var jumlahSuara = [];

        <?php foreach ($hasil as $data1) { ?>
            namaKandidat.push('<?= $data1->nama_anggota ?>');
            jumlahSuara.push(<?= $data1->total ?>);
        <?php } ?>

        var dataHasilSuara = {
            datasets: [{
                data: jumlahSuara,
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(255, 159, 64)',
                    'rgba(255, 205, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(54, 162, 235)',
                    'rgba(153, 102, 255)',
                    'rgba(201, 203, 207)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(201, 203, 207, 0.5)'
                ],

            }],
            labels: namaKandidat,
        }
        var chartHasilVoting = new Chart(hV, {
            type: 'pie',
            data: dataHasilSuara,
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: true,
                    position: 'bottom'
                },
            },
        });


        var hV2 = document.getElementById('ChartHasil2');
        var dataHasilSuara2 = {
            datasets: [{
                data: jumlahSuara,
                label: "Suara",
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(255, 159, 64)',
                    'rgba(255, 205, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(54, 162, 235)',
                    'rgba(153, 102, 255)',
                    'rgba(201, 203, 207)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(201, 203, 207, 0.5)'
                ],
                hoverBackgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(201, 203, 207, 0.5)'
                ],

            }],
            labels: namaKandidat,
        }
        var chartHasilVoting = new Chart(hV2, {
            type: 'bar',
            data: dataHasilSuara2,
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 100,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            maxTicksLimit: 1,
                            padding: 5,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false,
                    position: 'bottom'
                },
            },
        });
    <?php } ?>
</script>

</body>

</html>