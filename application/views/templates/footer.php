<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        by <b>Muhammad M. T.</b>
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="http://ponpes-smksa.sch.id">TOKO</a>.</strong> All rights
    reserved.
</footer> -->
</div>
<!-- ./wrapper -->

<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/adminlte.min.js"></script>
<script src="<?= base_url('assets/'); ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/script.js"></script>
<script>
    $(document).ready(function() {
        $('#tabel-data').DataTable();
    });
</script>
</body>

</html>