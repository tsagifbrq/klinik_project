<!-- jQuery -->
<script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>
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
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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


<!-- AdminLTE for demo purposes -->
<script src="assets/adminlte/dist/js/demo.js"></script>
</body>

<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')


        var dateObj = new Date();
        var month = dateObj.getUTCMonth() + 1; //months from 1-12
        var day = dateObj.getUTCDate();
        var year = dateObj.getUTCFullYear();
        var lastday = new Date(year, month + 1, 0).getDate();

        var bulan = new Array();
        for (let i = 0; i < lastday; i++) {
            bulan[i] = i + 1;
        }

        var areaChartData = {
            labels: bulan,
            datasets: [{
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'Electronics',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })
    })
</script>

</html>