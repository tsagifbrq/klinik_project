<!-- jQuery UI 1.11.4 -->
<!-- <script src="assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script> -->

<!-- Bootstrap 4 -->
<script src="assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets/adminlte/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE App -->
<script src="assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="assets/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>





<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

</body>

</html>