<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $totalpatient; ?></h3>
                        <p>Jumlah Pasien</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $pasientoday; ?></h3>
                        <p>Jumlah Pasien Hari Ini</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $negatifcovid; ?></h3>
                        <p>Pasien Negatif Covid</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $positifcovid; ?></h3>
                        <p>Pasien Positif Covid</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= $tesantigen; ?></h3>
                        <p>Pasien Tes Covid Antigen-Rapid</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3><?= $tesantibody; ?></h3>
                        <p>Pasien Tes Covid Antibody-Rapid</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3><?= $tespcr; ?></h3>
                        <p>Pasien Tes Covid PCR-Swap</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <div class="row-md-4">
                    <form action="" method="get">
                        <select name="bulan" id="">
                            <option value="01" <?= $bulan == "01" ? "selected" : "" ?>>Januari</option>
                            <option value="02" <?= $bulan == "02" ? "selected" : "" ?>>Februari</option>
                            <option value="03" <?= $bulan == "03" ? "selected" : "" ?>>Maret</option>
                            <option value="04" <?= $bulan == "04" ? "selected" : "" ?>>April</option>
                            <option value="05" <?= $bulan == "05" ? "selected" : "" ?>>Mei</option>
                            <option value="06" <?= $bulan == "06" ? "selected" : "" ?>>Juni</option>
                            <option value="07" <?= $bulan == "07" ? "selected" : "" ?>>Juli</option>
                            <option value="08" <?= $bulan == "08" ? "selected" : "" ?>>Agustus</option>
                            <option value="09" <?= $bulan == "09" ? "selected" : "" ?>>September</option>
                            <option value="10" <?= $bulan == "10" ? "selected" : "" ?>>Oktober</option>
                            <option value="11" <?= $bulan == "11" ? "selected" : "" ?>>November</option>
                            <option value="12" <?= $bulan == "12" ? "selected" : "" ?>>Desember</option>
                        </select>
                        <select name="tahun" id="">
                            <option value="2021" <?= $tahun == "2021" ? "selected" : "" ?>>2021</option>
                            <option value="2022" <?= $tahun == "2022" ? "selected" : "" ?>>2022</option>
                        </select>

                        <button type="submit" name="btn-go">Go</button>
                    </form>
                </div>
                <!-- BAR CHART -->
                <div class="card card-success">

                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /. BAR CHART -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->

        <!-- /.card -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>

<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------


        var dateObj = new Date();
        var month = dateObj.getUTCMonth() + 1; //months from 1-12
        var day = dateObj.getUTCDate();
        var year = dateObj.getUTCFullYear();
        var lastday = new Date(year, month + 1, 0).getDate();

        var bulan = new Array();
        for (let i = 0; i < lastday; i++) {
            bulan[i] = i + 1;
        }
        var hari = <?= json_encode($dailypasien); ?>;
        var areaChartData = {
            labels: bulan,
            datasets: [{
                label: 'Total Pasien',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: hari
            }, ]
        }
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = areaChartData
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    });
</script>