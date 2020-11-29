</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/template/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/template/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/template/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/template/dist/js/demo.js"></script>
<!-- SWEET ALERT2 -->
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>-->
<script src="<?php echo base_url(); ?>assets/bower_components/sweetalert-master/dist/sweetalert.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/datatables/datatables.min.js"></script> -->
<script type="text/javascript" class="init">
    $(function () {
        $('#example2').DataTable({
          "paging": true,
          "responsive": true,
        });
    });
  
    $(document).ready(function () {
		$(document).ajaxStart(function(){
			$("#wait").css("display", "block");
		});
		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		});
		
		var success = "<?= $this->session->flashdata('success') ?>";
        var failed = "<?= $this->session->flashdata('failed') ?>";
        var info = "<?= $this->session->flashdata('info') ?>";
    
        if (success != '') {
          swal('Success', success, 'success');
        }
    
        if (failed != '') {
          swal('Failed', failed, 'error');
        }
    
        if (info != '') {
          swal('Info', info, 'info');
        }


	});
</script>


</body>
</html>