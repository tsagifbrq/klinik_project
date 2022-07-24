<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan List Pasien</title>
    <link rel="shortcut icon" type="image/png" href="/logo.png" />
</head>

<body>
    <table style="width: 100%; border-collapse: collapse; text-align: center;" border="1">
        <tr>
            <td>
                <table style="width: 100%; text-align: center;" border="0">
                    <tr style="text-align: center;">
                        <td>
                            <h1>Klinik Al-Syifa</h1>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width: 100%; text-align: center;" border="0">
                    <tr style="text-align: center;">
                        <td>
                            <h3><u>Laporan Pasien Berdasarkan Bulan</u></h3> <br>
                            Periode Bulan : <?= $bulanAwal . " s/d " . $bulanAkhir . ' Tahun ' . $tahun; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <table border="1" style="border-collapse: collapse; border: 1px solid #000; text-align: center; width: 80%;">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($filterBulan as $row) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= date_format(new DateTime($row['created_at']), 'd-m-Y'); ?></td>
                                                <td><?= $row['nik']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['gender']; ?></td>
                                                <td><?= $row['checkup']; ?></td>
                                                <td><?= $row['ref_number']; ?></td>
                                                <td><?= $row['result']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php echo "Jumlah Pasien Pada Bulan " . $bulanAwal . ' S/D ' . $bulanAkhir . ' = ' . count($filterBulan) ?>
                                    </tbody>

                                </table>
                            </center>
                            <br>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>

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