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
                            <form action="<?= base_url('cetak_guru');?>" method="post" role="form">
                                <div class="form-group">
                                    <label for="cetak-guru">Pilih Mata Pelajaran :</label>
                                    <select class="form-control" name="cetak-mapel">
                                        <option selected disabled>Pilih Mata Pelajaran...</option>
                                        <?php foreach($listmapel as $lm){ ?>
                                        <option value="<?= $lm->id_mapel;?>"><?= $lm->mapel;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button formtarget="_blank" type="submit" class="btn btn-sm btn-success"> <i class="fa fa-print"></i> Cetak</button>
                            </form>  
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>