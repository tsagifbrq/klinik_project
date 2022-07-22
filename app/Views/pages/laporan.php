<!-- Main Content -->
<section class="content">
    <div class="row">
        <div class="col">
            <div class="card text bg-primary mb-3">
                <div class="card-header">Berdasarkan Tanggal</div>
                <div class="card-body bg-white">
                    <p class="card-text">
                        <?php echo form_open('laporan/print_laporan_tanggal', ['target' => '_blank']); ?>
                    <div class="form-group">
                        <label for="">Tanggal Awal : </label>
                        <input type="date" name="tglawal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Akhir : </label>
                        <input type="date" name="tglakhir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success">
                            <i class="fa fa-print"></i> Cetak Laporan
                        </button>
                    </div>
                    <?php echo form_close(); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text bg-primary mb-3">
                <div class="card-header">Berdasarkan Bulan</div>
                <div class="card-body bg-white">
                    <p class="card-text">
                        <?php echo form_open('laporan/print_laporan_bulan', ['target' => '_blank']); ?>
                    <div class="form-group">
                        <label for="">Bulan Awal : </label>
                        <select name="bulanawal" class="form-control">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Bulan Akhir : </label>
                        <select name="bulanakhir" class="form-control">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun : </label>
                        <select name="tahun1" id="" required="">
                            <?php foreach ($tahun as $value) : ?>
                                <option value="<?php echo $value->tahun ?>"><?php echo $value->tahun ?></option>
                            <?php endforeach; ?>
                        </select>


                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success">
                            <i class="fa fa-print"></i> Cetak Laporan
                        </button>
                    </div>
                    <?php echo form_close(); ?>
                    </p>
                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card text bg-primary mb-3">
                <div class="card-header">Berdasarkan Tahun
                    <div class="card-body bg-white">
                        <p class="card-text">
                            <?php echo form_open('laporan/print_laporan_tahun', ['target' => '_blank']); ?>
                        <div class="form-group">
                            <label for="">Tahun : </label>
                            <select name="tahun2" id="" required="">
                                <?php foreach ($tahun as $value) : ?>
                                    <option value="<?php echo $value->tahun ?>"><?php echo $value->tahun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-success">
                                <i class="fa fa-print"></i> Cetak Laporan
                            </button>
                        </div>
                        <?php echo form_close(); ?>
                        </p>
                    </div>
                </div>

            </div>
        </div>
</section>