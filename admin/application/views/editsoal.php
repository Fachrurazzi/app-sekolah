<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Edit Soal</h1>
    </section>

    <section class="content">
        <div class="box box-purple">
            <div class="box-header">
                <a href="<?=$this->agent->referrer();?>" class="btn btn-sm btn-success"><i class="fa fa-angle-left"></i>  Kembali</a>                
            </div>
            <div class="box-body">
                <form action="<?=base_url('admin/act_esoal/'.$soal->id_soal);?>" enctype="multipart/form-data" method="POST">
                    <?php if($this->session->status == 'admin') : ?>
                    <div class="col-md-4 form-group">
                        <label for="mapel">Mata Pelajaran :</label>
                        <select name="mapel" id="mapel" class="form-control" required="">
                            <?php foreach($listmapel as $lm){ ?>
                            <option value="<?= $lm->id_mapel;?>" <?= $soal->id_mapel == $lm->id_mapel ? 'selected' : '' ?>><?= $lm->mapel;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="kelas">Kelas :</label>
                        <select name="kelas" id="kelas" class="form-control" required="">
                            <?php foreach($listkelas as $lk){ ?>
                            <option value="<?= $lk->id_kelas;?>" <?=$soal->id_kelas == $lk->id_kelas ? 'selected' : '';?>><?= $lk->kode_kelas;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="guru">Guru :</label>
                        <select name="guru" id="guru" class="form-control" required="">
                            <?php foreach($listguru as $lg){ ?>
                            <option value="<?= $lg->id_guru;?>" <?=$soal->id_guru == $lg->id_guru ? 'selected' : '';?>><?= $lg->nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="kategori">Kategori Soal :</label>
                        <select name="kategori" id="kategori" class="form-control" required="">
                            <?php foreach($listkategori as $lkt){ ?>
                            <option value="<?= $lkt->id_kategori;?>" <?=$soal->id_kategori == $lkt->id_kategori ? 'selected' : '';?>><?= $lkt->kategori;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="nama_soal">Nama Soal :</label>
                        <input value="<?= $soal->nama_soal ?>" class="form-control" name="nama_soal" placeholder="Nama Soal..."></input>
                    </div>
                    <?php else : ?>
                    <div class="col-md-4 form-group">
                        <label for="kelas">Kelas :</label>
                        <select name="kelas" id="kelas" class="form-control" required="">
                            <option value="<?=$soal->id_kelas;?>"><?=$soal->kode_kelas;?></option>
                            <?php foreach($listkelas as $lk){ ?>
                            <option value="<?= $lk->id_kelas;?>"><?= $lk->kode_kelas;?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="kategori">Kategori Soal :</label>
                        <select name="kategori" id="kategori" class="form-control" required="">
                            <option value="<?=$soal->id_kategori;?>"><?=$soal->kategori;?></option>
                            <?php foreach($listkategori as $lkt){ ?>
                            <option value="<?= $lkt->id_kategori;?>"><?= $lkt->kategori;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="nama_soal">Nama Soal :</label>
                        <input value="<?= $soal->nama_soal ?>" class="form-control" name="nama_soal" placeholder="Nama Soal..."></input>
                    </div>                        
                    <?php endif; ?>
                    <div class="col-md-12 form-group">
                        <label for="Soal">Soal :</label>
                        <textarea id="fieldSoal" name="soal" required=""><?=$soal->soal;?></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="Media">Media :</label>
                        <input type="file" name="media">
                        <?php
                        $ex = explode(".", $soal->media);
                        $ex = strtolower(end($ex));
                        if ($ex == 'jpg' || $ex == 'png') { ?>
                            <img src="<?=base_url('./../media/'.$soal->media);?>" class="img-esoal">
                        <?php }
                        if($ex == 'mp3' || $ex == 'wav'){?>
                            <audio src="<?=base_url('./../media/'.$soal->media);?>" controls></audio>
                        <?php } ?>
                        
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="A">Opsi A</label>
                        <input type="text" name="a" class="form-control" placeholder="Jawaban A" required="" value="<?=$soal->opsi_a;?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="B">Opsi B</label>
                        <input type="text" name="b" class="form-control" placeholder="Jawaban B" required="" value="<?=$soal->opsi_b;?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="C">Opsi C</label>
                        <input type="text" name="c" class="form-control" placeholder="Jawaban C" required="" value="<?=$soal->opsi_c;?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="D">Opsi D</label>
                        <input type="text" name="d" class="form-control" placeholder="Jawaban D" required="" value="<?=$soal->opsi_d;?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="Jawaban">Jawaban</label>
                        <select name="jawaban" id="" class="form-control" required="">
                            <option value="<?=$soal->jawaban;?>"><?=$soal->jawaban;?></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        <input type="hidden" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit Soal</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script async="defer">
$(function(){
    CKEDITOR.replace('fieldSoal')
    <?php
    if ($this->session->flashdata('soal')) { ?>
        Swal.fire('Sukses!', 'Soal berhasil diedit', 'success');
    <?php
    }
    ?>
})
</script>


<!-- CK Editor -->
<script src="<?= base_url('./../assets/adminlte/bower_components/ckeditor/ckeditor.js');?>"></script>