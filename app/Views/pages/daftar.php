<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klinik Al-Syifa | Daftar</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row py-5">
                <!-- left column -->
                <div class="col-md-6  mx-auto">

                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Test Covid</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputNik">NIK</label>
                                    <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK">
                                </div>
                                <div class="form-group">
                                    <label for="inputNama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan NAMA">
                                </div>
                                <div class="form-group">
                                    <label for="inputNoTelp">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="noTelp" placeholder="Masukkan No.Telp">
                                </div>
                                <div class="form-group">
                                    <label for="inputTempatLahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempatLahir" placeholder="Masukkan Tempat Lahir Anda">
                                </div>
                                <div class="form-group">
                                    <label for="inputTglLahir">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tgl_Lahir" placeholder="Masukkan Tanggal Lahir Anda">
                                </div>
                                <div class="form-group">
                                    <label for="SelectPemeriksaan">Pemeriksaan</label>
                                    <select class="form-control">
                                        <option>Covid Antigen - Rapid</option>
                                        <option>Covid Antibody - Rapid</option>
                                        <option>Covid PCR - Swap</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Atas Permintaan</label>
                                    <input type="text" class="form-control" id="permintaan" placeholder="Masukkan Tujuan Permintaan Anda">
                                </div>
                                <div class="form-group">
                                    <label for="inputPemeriksaan">Jenis Kelamin</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio1" checked>
                                            <label class="form-check-label">Laki-laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio1">
                                            <label class="form-check-label">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <<<<<<< HEAD </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" href="/dashboard">Submit</button>
                                    </div>
                                    =======
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" href="/dashboard" method="POST ">Submit</button>
                                    </div>
                                    >>>>>>> origin/tsagif
                        </form>
                        <!-- /.card -->

                        <!-- jQuery -->
                        <script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>
                        <!-- Bootstrap 4 -->
                        <script src="assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <!-- AdminLTE App -->
                        <script src="assets/adminlte/dist/js/adminlte.min.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>