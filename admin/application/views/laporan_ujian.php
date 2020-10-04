    <div class="content-wrapper">
        <section class="content-header">
            <h1 class="text-center">
                <?= $title; ?>
            </h1>
        </section>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <section class="content">
                    <div class="box box-purple">
                        <div class="box-body">
                            <form action="<?= base_url('cetak-ujian') ?>" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="bulan">Bulan :</label>
                                            <select class="form-control" name="cetak-bulan">
                                                <option selected disabled>Pilih Bulan</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="tahun">Tahun Ajaran :</label>
                                            <input name="cetak-tahun" class="form-control">
                                        </div>                                           
                                    </div>
                                    <div class="box-footer">
                                        <button formtarget="_blank" type="submit" class="btn btn-sm btn-success"> <i class="fa fa-print"></i> Print</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </section>
            </div>
        </div>
    </div>