<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table Pasien</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Telepon</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listpasien as $p) : ?>
                                    <tr>
                                        <td><?= $p['nik']; ?></td>
                                        <td><?= $p['name']; ?></td>
                                        <td><?= $p['place_of_birth']; ?></td>
                                        <td><?= date_format(new DateTime($p['birthday']), 'd-m-Y'); ?></td>
                                        <td><?= $p['gender']; ?></td>
                                        <td><?= $p['phone']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>