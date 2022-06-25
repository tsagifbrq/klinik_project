<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Pemeriksaan</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pemeriksaan</th>
                                    <th>Nomor Surat</th>
                                    <th width='200px'>Aksi</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($patienttoday as $p) : ?>
                                    <tr>
                                        <th><?= $i++; ?></th>
                                        <td><?= $p['created_at']; ?></td>
                                        <td><?= $p['nik']; ?></td>
                                        <td><?= $p['name']; ?></td>
                                        <td><?= $p['gender']; ?></td>
                                        <td><?= $p['checkup']; ?></td>
                                        <td><?= $p['ref_number']; ?></td>
                                        <td>
                                            <div class="row">
                                                <!-- <button class="btn btn-sm btn-success m-1" id="editbutton">Edit</button> -->
                                                <?php if (is_null($p['result']) == true) : ?>
                                                    <div class="col-9">
                                                        <form action="update_result/<?= $p['id']; ?>" method="post" class="row">
                                                            <div class="col-10">
                                                                <select id="inputResult" class="form-select" name="result">
                                                                    <option value="Negatif" selected>Negatif</option>
                                                                    <option value="Postif">Positif</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-2">
                                                                <button class="btn btn-xs btn-success"><i class="far fa-share-square"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (is_null($p['result']) == false && is_null($p['qr_code']) == false) : ?>
                                                    <div class="col-12">
                                                        <button class="btn btn-xs btn-primary" onclick="inputqrcode(<?= $p['id']; ?>)"><i class="fas btn-xs fa-qrcode"></i></button>
                                                        <a href="download/<?= $p['nik']; ?>/<?= $p['id']; ?>" class="btn btn-xs btn-success"><i class="fas btn-xs fa-download"></i></a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (is_null($p['result']) == false && is_null($p['qr_code']) == true) : ?>
                                                    <div class="col-12">
                                                        <button class="btn btn-xs btn-primary" onclick="inputqrcode(<?= $p['id']; ?>)"><i class="fas btn-xs fa-qrcode"></i></button>
                                                        <a href="download/<?= $p['nik']; ?>/<?= $p['id']; ?>" class="btn btn-xs btn-warning"><i class="fas btn-xs fa-download"></i></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-6">
                                                <form action="hapus/<?= $p['id']; ?>" method="POST">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin?');"><i class="fas btn-xs fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td>
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