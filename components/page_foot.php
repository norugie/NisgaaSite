
<!-- Bootstrap Core Js -->
<script src="../plugins/bootstrap/js/bootstrap.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../plugins/node-waves/waves.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="../plugins/sweetalert/sweetalert.min.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Select Plugin Js -->
<script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="../plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- Custom Js -->
<script src="../js/admin.js"></script>
<script src="../js/dialogs.js"></script>
<script src="../js/edit.js"></script>


<!-- Custom JS DataTable -->
<script>
	$('.js-basic-example').DataTable({
    	"bSort": false,
    	"lengthChange": false,
    	"iDisplayLength": 5
	});
</script>

<!-- Custom JS Bootstrap DatePicker -->
<script>
$('#bs_datepicker_range_container_new').datepicker({
	autoclose: true,
	container: '#bs_datepicker_range_container_new',
	todayHighlight: true,
	startDate: '0d',
	format: 'dd M yyyy'
});

$('#bs_datepicker_range_container_edit').datepicker({
	autoclose: true,
	container: '#bs_datepicker_range_container_edit',
	todayHighlight: true,
	startDate: '0d',
	format: 'dd M yyyy'
});
</script>