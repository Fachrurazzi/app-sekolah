<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">
            Soal |
            <small><?=$kelas['kode_kelas'];?></small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-info box-solid">
            <div class="box-header">
                <?php if ($this->session->status == 'admin') { ?>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="MataPelajaran">Mata Pelajaran :</label>
                        <select name="mapel" id="pilihmapel" class="form-control">
                            <option value="null">Pilih Mata Pelajaran...</option>
                            <?php foreach ($pilihmapel as $pm) { ?>
                            <option value="<?=$pm->id_mapel;?>"><?=$pm->mapel;?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori :</label>
                        <select name="kategori" id="pilihkategori" class="form-control">
                            <option value="null">Pilih Kategori...</option>
                            <?php foreach ($pilihkategori as $pk) { ?>
                            <option value="<?=$pk->id_kategori;?>"><?=$pk->kategori;?></option>
                        <?php } ?>
                        </select>
                    </div>                    
                    <div class="form-group">
                        <a class="btn btn-info" id="filter"><i class="fa fa-print"></i> Filter</a>
                    </div>
                </div>
                <?php }
                if ($this->session->status == 'guru') { ?>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="kt-guru">Kategori :</label>
                            <select name="kt-guru" id="kt-guru" class="form-control">
                                <option value="null">Pilih Kategori...</option>
                                <?php foreach ($pilihkategori as $pk) { ?>
                                <option value="<?=$pk->id_kategori;?>"><?=$pk->kategori;?></option>
                            <?php } ?>
                            </select>
                        </div>                    
                        <div class="form-group">
                            <a class="btn btn-info" id="filter-guru"><i class="fa fa-print"></i> Filter</a>
                        </div>
                    </div>                    
                <?php } ?>
            </div>
            <div class="box-body">
                <!-- Tabel Soal -->
                <table class="table table-bordered table-striped table-hover table-responsive" id="tabelSoal">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center" style="width: 150px;">Guru</th>
                            <th class="text-center" style="width: 100px;">Kategori Soal</th>
                            <th class="text-center" style="width: 200px;">Nama Soal</th>
                            <th class="text-center">Soal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //Jika Admin
                     if($this->session->status == 'admin'){
                         $no = 1;
                         if(!empty($listsoal)){
                         foreach($listsoal as $ls): ?>
                        <tr>
                            <td class="text-center"><?=$no++;?></td>
                            <td><?=$ls->nama;?></td>
                            <td><?=$ls->kategori;?></td>
                            <td><?=$ls->nama_soal;?></td>
                            <td><?=$ls->soal;?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-info m2px" data-toggle="modal" data-target="#info<?=$ls->id_soal;?>"><i class="fa fa-info"></i> Info</button>
                                <a href="<?=base_url('editsoal/'.$ls->id_soal);?>" class="btn btn-xs btn-warning m2px"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-xs btn-danger m2px" data-toggle="modal" data-target="#hapus<?=$ls->id_soal;?>"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <!-- Modal Info Soal -->
                        <div class="modal fade" id="info<?=$ls->id_soal;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-list-alt"></i> Info Soal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <?php 
                                            $ex = explode(".", $ls->media);
                                            $ex = strtolower(end($ex));
                                            if ($ex == 'jpg' || $ex == "png") { ?>
                                            <img src="<?=base_url('./../media/'.$ls->media);?>" class="img-thumbnail">
                                            <?php }
                                            if ($ex == 'mp3' || $ex == 'wav') { ?>
                                            <audio src="<?=base_url('./../media/'.$ls->media);?>" controls></audio>
                                            <?php } ?>
                                            <div class="box box-solid with-border info-soal">
                                                <div class="box-body">
                                                    <h5>Soal :</h5>
                                                    <p><?=$ls->soal;?></p>
                                                    <hr>
                                                    <h5>Opsi A :</h5>
                                                    <p><?=$ls->opsi_a;?></p>
                                                    <h5>Opsi B :</h5>
                                                    <p><?=$ls->opsi_b;?></p>
                                                    <h5>Opsi C :</h5>
                                                    <p><?=$ls->opsi_c;?></p>
                                                    <h5>Opsi D :</h5>
                                                    <p><?=$ls->opsi_d;?></p>
                                                    <h4>Jawaban : </h4>
                                                    <p><?=$ls->jawaban;?></p>
                                                </div>
                                                <div class="box-footer">
                                                    <h5>Dibuat oleh : </h5>
                                                    <p><?=$ls->nama;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal hapus soal -->
                        <div class="modal fade" id="hapus<?=$ls->id_soal;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Soal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <h4>Anda yakin akan menghapus soal ?</h4>
                                        </div>
                                        <div class="box-footer">
                                            <a href="<?= base_url('admin/hapus_soal/'.$ls->id_soal);?>" class="btn btn-danger">Ya</a> &nbsp;
                                            <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                         endforeach;
                        }
                     }
                    //Jika Guru
                    if($this->session->status == 'guru'){
                        $no = 1;
                        foreach($listsoal as $ls):
                    ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$this->session->nama;?></td>
                            <td><?=$ls->kategori;?></td>
                            <td><?=$ls->nama_soal;?></td>
                            <td><?=$ls->soal;?></td>
                            <td>
                                <button class="btn btn-xs btn-info m2px" data-toggle="modal" data-target="#info<?= $ls->id_soal;?>"><i class="fa fa-info"></i> Info</button>
                                <a href="<?=base_url('editsoal/'.$ls->id_soal);?>" class="btn btn-xs btn-warning m2px"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-xs btn-danger m2px"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <!-- Modal Info Soal -->
                        <div class="modal fade" id="info<?=$ls->id_soal;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Info Soal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <?php 
                                            $ex = explode(".", $ls->media);
                                            $ex = strtolower(end($ex));
                                            if ($ex == 'jpg' || $ex == "png") { ?>
                                            <img src="<?=base_url('./../media/'.$ls->media);?>" class="img-thumbnail">
                                            <?php }
                                            if ($ex == 'mp3' || $ex == 'wav') { ?>
                                            <audio src="<?=base_url('./../media/'.$ls->media);?>" controls></audio>
                                            <?php } ?>
                                            <div class="box box-solid with-border info-soal">
                                                <div class="box-body">
                                                    <h5>Soal :</h5>
                                                    <p><?=$ls->soal;?></p>
                                                    <hr>
                                                    <h5>Opsi A :</h5>
                                                    <p><?=$ls->opsi_a;?></p>
                                                    <h5>Opsi B :</h5>
                                                    <p><?=$ls->opsi_b;?></p>
                                                    <h5>Opsi C :</h5>
                                                    <p><?=$ls->opsi_c;?></p>
                                                    <h5>Opsi D :</h5>
                                                    <p><?=$ls->opsi_d;?></p>
                                                    <h4>Jawaban : </h4>
                                                    <p><?=$ls->jawaban;?></p>
                                                </div>
                                                <div class="box-footer">
                                                    <h5>Dibuat oleh : </h5>
                                                    <p><?=$ls->nama;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; } ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function(){
    $('#filter').on('click', function(e){
        e.preventDefault();
        var id = $('#pilihmapel option:selected').val();
        var id_kategori = $('#pilihkategori option:selected').val();
        var param = "";
        if(id != "null"){
            param += "?id_mapel=" + id;
        }
        if(id_kategori != "null"){
            if(param == ""){
                param += "?id_kategori=" + id_kategori; 
            } else {
                param += "&id_kategori=" + id_kategori;
            }
        }
        location.href = '<?=base_url("soal/".$kelas['id_kelas']."/");?>'+param; 
    });

    $('#filter-guru').on('click', function(e){
        e.preventDefault();
        var id_kategori_guru = $('#kt-guru option:selected').val();
        var param = "";
        if(id_kategori_guru != "null"){
            if(param == ""){
                param += "?id_kategori=" + id_kategori_guru; 
            }
        }
        location.href = '<?=base_url("soal/".$kelas['id_kelas']."/");?>'+param; 
    });
    $('#tabelSoal').DataTable({
      'paging' : true,
      'lengthChange' : true,
      'searching' : true,
      'ordering' : false,
      'info' : true,
      'autoWidth' : false        
    });
})
</script>