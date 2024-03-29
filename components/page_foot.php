
<!-- Popper Plugin Js -->
<script src="../plugins/popper/popper.js"></script>

<!-- Bootstrap Core Js -->
<script src="../plugins/bootstrap-v4/js/bootstrap.js"></script>

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

<!-- Validation Plugin Js -->
<script src="../plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="../js/admin.js"></script>
<script src="../js/dialogs.js"></script>
<script src="../js/edit.js"></script>
<script src="../js/custom.js"></script>

<!-- TinyMCE Image Link Modification Script -->
<script>
    var schoolIndicator = "<?php echo $_SESSION['school']; ?>";
    var schoolLink;

    if(schoolIndicator === '3') schoolLink = "https://ness.nisgaa.bc.ca";
    else if(schoolIndicator === '4') schoolLink = "https://aames.nisgaa.bc.ca";
    else if(schoolIndicator === '5') schoolLink = "https://ges.nisgaa.bc.ca";
    else if(schoolIndicator === '6') schoolLink = "https://nbes.nisgaa.bc.ca";
    else schoolLink = "https://www.nisgaa.bc.ca";
        
</script>

