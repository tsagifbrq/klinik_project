<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-success m-3" role="alert">
                                <?= session()->getFlashdata('message'); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="card-title">Tabel Pasien Hari ini</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php echo session()->getFlashdata('msg') ?>
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
                                    <th>Hasil</th>
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
                                        <td><?= $p['result']; ?></td>
                                        <td>
                                            <a href="hasil/<?= $p['id']; ?>" class="btn btn-success"> Hasil</i>
                                            </a>




                                        </td>
                                        <td>
                                            <form action="hapus/<?= $p['id']; ?>" method="GET">
                                                <?= csrf_field(); ?>
                                                <button type="button" data-toggle="modal" data-target="#modalUbah" id="edit" class="btn btn-warning" data-id="<?= $p['id']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-s btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?');"><i class="fas btn-xs fa-trash-alt"></i></button>
                                            </form>
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


<form action="/pasient-today/update" method="post">
    <div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>No.RM</label>
                        <input type="text" class="form-control no_rm" name="no_rm" placeholder="Nomor Pasien" value="<?= $p['no_rm']; ?>">
                    </div>
                    <div class="form-group">
                        <label>No.Surat</label>
                        <input type="text" class="form-control ref_number" name="ref_number" placeholder="Nomor Surat" value="<?= $p['ref_number']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Hasil</label>
                        <select name="result" class="form-control result">
                            <option value="<?= $p['result']; ?>">-Select-</option>
                            <option value="Positif">Positif</option>
                            <option value="Negatif">Negatif</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id" value="<?= $p['id']; ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>