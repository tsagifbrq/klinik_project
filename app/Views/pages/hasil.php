<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Laporan</title>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            padding: 10px;
            width: 350px;
            /* Should be removed. Only for demonstration */
        }

        .column img {
            width: 40%;
        }

        /* Clear floats after the columns */
        .row {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>

    <img src="<?= base_url('word_logo.jpg'); ?>" width="100%" alt="" /><br><br>
    <table border=0 width=100% cellpadding=1 cellspacing=0 style="margin-top: 5px; text-align:Left">
        <tbody>
            <tr>
                <td width="15%">No RM : <?= $cid['no_rm']; ?></td>
                <!-- <td width="35%">: <?= $cid['no_rm']; ?></td> -->
                <td width="20%">Pemeriksaan : <?= $cid['checkup']; ?></td>
                <!-- <td width="30%">: <?= $cid['checkup']; ?></td> -->
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <?= $pid['name']; ?></td>
                <td>Atas Permintaan</td>
                <td>: <?= $cid['upon_request']; ?></td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>: <?= $pid['place_of_birth']; ?>, <?= date('d-m-Y', strtotime($pid['birthday'])); ?></td>
                <td>Waktu Pemeriksaan</td>
                <td>: <?= $cid['created_at']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <?= $pid['gender']; ?></td>
                <td>No. Surat</td>
                <td>: <?= $cid['ref_number']; ?></td>
            </tr>
        </tbody>
    </table>

    <p>Metode Pemeriksaan : <b><i><?= $cid['checkup_metode']; ?></i></b></p>
    <table border=1 width=100% cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:Center">
        <tbody>
            <tr>
                <th style="width: 30%;">Pemeriksaan</th>
                <th style="width: 30%;">Hasil</th>
                <th style="width: 30%;">Nilai Rujukan</th>
            </tr>
            <tr>
                <th height="80"><?= $cid['checkup']; ?></th>
                <th height="80"><?= $cid['result']; ?></th>
                <th height="80">Negatif</th>
            </tr>
        </tbody>
    </table>

    <p><b>SARAN : </b><br>
        • Lakukan pemeriksaan Swab PCR jika hasil positif / Perform a PCR Swab if the result is positive,<br>
        • Memakai masker / Wearing a mask,<br>
        • Mencuci tangan / Wash hands,<br>
        • Menjaga jarak / Keep physical distance,<br>
        • Menjauhi kerumunan / Stay away from crowd,<br>
        • Membatasi mobilisasi / Limiting mobilization. </p>
    <div class="row">
        <div class="column">
            <?php if (isset($cid['qr_code'])) : ?>
                <img src="<?= base_url('qrcode' . $cid['id'] . '.png'); ?>" alt="">
            <?php endif; ?>
        </div>
        <div class="column" style="margin-left: auto; text-align: center;">
            <p>Pemeriksa <br> Penanggung Jawab <br><br><br>
                <img src="<?= base_url('ttd.jpg'); ?>" alt="">
                <br>dr. Ali Reza
            </p>
        </div>
    </div>


</body>

</html>