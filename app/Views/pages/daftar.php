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
                        <form id="savedataform">
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success m-3" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->getFlashdata('pesanhapus')) : ?>
                                <div class="alert alert-danger m-3" role="alert">
                                    <?= session()->getFlashdata('pesanhapus'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputNik">NIK</label>
                                    <input type="text" class="form-control" id="inputNIK" name="nik" placeholder="Masukkan NIK" onchange="checknik()" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputNama">Nama</label>
                                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Masukkan NAMA" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputNoTelp">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Masukkan No.Telp" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputTempatLahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="inputPOB" name="place_of_birth" placeholder="Masukkan Tempat Lahir Anda" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputTglLahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="inputBirthday" name="birthday" placeholder="Masukkan Tanggal Lahir Anda" required>
                                </div>
                                <div class="form-group">
                                    <label for="SelectPemeriksaan">Pemeriksaan</label>
                                    <select class="form-control" id="inputExam" name="examination" required>
                                        <option value="Covid Antigen - Rapid">Covid Antigen - Rapid</option>
                                        <option value="Covid Antibody - Rapid">Covid Antibody - Rapid</option>
                                        <option value="Covid PCR - Swap">Covid PCR - Swap</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Atas Permintaan</label>
                                    <input type="text" class="form-control" id="inputReq" name="upon_request" placeholder="Masukkan Tujuan Permintaan Anda" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputPemeriksaan">Jenis Kelamin</label>
                                    <div class="form-group" id="genderradio">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="genderRadio1" value="Laki-Laki" checked>
                                            <label class="form-check-label">Laki-laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="genderRadio1" value="Perempuan">
                                            <label class="form-check-label">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" value="Submit" class="btn btn-primary" form-id="savedataform">
                            </div>
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
    <script type="text/javascript">
        $(function() {
            $("#savedataform").submit(function(e) {
                $.ajax({
                    url: "savedata",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        alert(response.success);
                        window.location.replace("/daftar");
                        // $('#editpatient').modal('hide');
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                e.preventDefault();
            });
        });

        function checknik() {
            //Ajax Load data from ajax
            var id = $('#inputNIK').val();
            var table = "patients";

            $.ajax({
                url: "getdata",
                type: "POST",
                data: {
                    id: id,
                    table: table
                },
                dataType: "json",
                success: function(response) {
                    if (response) {
                        $('#nik').val(response.nik);
                        $('#inputName').val(response.name);
                        $('#inputPOB').val(response.place_of_birth);
                        $('#inputBirthday').val(response.birthday);
                        $('#inputPhone').val(response.phone);
                        if (response.gender == 'Perempuan')
                            $('#genderradio').find(':radio[name=gender][value="Perempuan"]').prop('checked', true);
                        else if (response.gender == 'Laki-Laki')
                            $('#genderradio').find(':radio[name=gender][value="Laki-Laki"]').prop('checked', true);
                        endif;
                    } else {
                        $('#inputName').val('');
                        $('#inputPOB').val('');
                        $('#inputBirthday').val('');
                        $('#inputPhone').val('');
                        $('#genderradio').find(':radio[name=gender][value="Perempuan"]').prop('checked', false);
                        $('#genderradio').find(':radio[name=gender][value="Laki-Laki"]').prop('checked', false);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>
</body>

</html>