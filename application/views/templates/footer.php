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
<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>adminpage/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>adminpage/vendor/datatables/dataTables.bootstrap4.min.js"></script>



<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>adminpage/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/') ?>adminpage/js/demo/chart-pie-demo.js"></script>
<script src="<?= base_url('assets/') ?>adminpage/js/demo/datatables-demo.js"></script>

<script>
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
    })


    // $(document).ready(function() {
    //     $('#form').on("submit", (function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             url: "",
    //             type: 'POST',
    //             data: new FormData(this),
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             success: function(msg) {
    //                 $('.pesan').html(msg);
    //             }
    //         });
    //     }));
    // })

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
    })
</script>



</body>

</html>