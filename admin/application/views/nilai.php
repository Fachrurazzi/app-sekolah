<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center"><?=$judul;?> | <small><?=$kls;?></small></h1>
    </section>

    <section class="content">
        <div class="box box-info <?= $this->session->status == 'admin' ? 'box-solid' : '' ?>">
            <div class="box-header with-border">
                <?php if($this->session->status == 'admin') : ?>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="MataPelajaran">Mata Pelajaran :</label>
                        <select id="pilihmapel" class="form-control">
                            <option selected>Pilih Mata Pelajaran...</option>
                            <?php foreach($listmapel as $lm){ ?>
                            <option value="<?= $lm->id_mapel;?>"><?= $lm->mapel;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <?php endif; ?>
                <!-- Modal Cetak Siswa -->
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">NIS</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">Mapel</th>
                            <th class="text-center">Ulangan 1</th>
                            <th class="text-center">Ulangan 2</th>
                            <th class="text-center">Ulangan 3</th>
                            <th class="text-center">UTS</th>
                            <th class="text-center">UAS</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody id="datanilai">
                    <?php if($this->session->status == 'admin') : ?>
                        <?php
                        $no = 1;
                        if (!empty($nilai)) {
                        foreach($nilai as $n){ ?>
                        <tr>
                            <td class="text-center"><?=$no++;?></td>
                            <td><?=$n->nis;?></td>
                            <td><?=$n->nama;?></td>
                            <td><?=$n->mapel;?></td>
                            <td class="text-center"><?=$n->ulangan_1;?></td>
                            <td class="text-center"><?=$n->ulangan_2;?></td>
                            <td class="text-center"><?=$n->ulangan_3;?></td>
                            <td class="text-center"><?=$n->uts;?></td>
                            <td class="text-center"><?=$n->uas;?></td>
                            <td class="text-center"><button class="btn btn-hapus<?=$n->id_siswa;?> btn-xs btn-danger"><i class="fa fa-trash"></i></button></td>
                            <script>
                                $(document).ready(function(){
                                    $('.btn-hapus<?=$n->id_siswa;?>').on('click', function(){
                                        Swal.fire({
                                            title: 'Hapus Nilai',
                                            text: 'Anda yakin akan menghapus nilai tersebut ?',
                                            type: 'question',
                                            showCancelButton: true,
                                            confirmButtonText: 'Hapus'
                                        }).then((result) => {
                                            if (result.value) {
                                            location.href='<?=base_url("admin/hapus_nilai/".$n->id_tes);?>';
                                            }
                                        })
                                    }) 
                                })
                            </script>
                        </tr>
                        <?php }
                        } ?>
                    <?php endif; ?>

                    <?php if($this->session->status == 'guru') : ?>
                        <?php
                        $no = 1;
                        if (!empty($nilai_by_guru)) {
                        foreach($nilai_by_guru as $n){ ?>
                        <tr>
                            <td class="text-center"><?=$no++;?></td>
                            <td><?=$n->nis;?></td>
                            <td><?=$n->nama;?></td>
                            <td><?=$n->mapel;?></td>
                            <td class="text-center"><?=$n->ulangan_1;?></td>
                            <td class="text-center"><?=$n->ulangan_2;?></td>
                            <td class="text-center"><?=$n->ulangan_3;?></td>
                            <td class="text-center"><?=$n->uts;?></td>
                            <td class="text-center"><?=$n->uas;?></td>
                            <td class="text-center"><button class="btn btn-hapus<?=$n->id_siswa;?> btn-xs btn-danger"><i class="fa fa-trash"></i></button></td>
                            <script>
                                $(document).ready(function(){
                                    $('.btn-hapus<?=$n->id_siswa;?>').on('click', function(){
                                        Swal.fire({
                                            title: 'Hapus Nilai',
                                            text: 'Anda yakin akan menghapus nilai tersebut ?',
                                            type: 'question',
                                            showCancelButton: true,
                                            confirmButtonText: 'Hapus'
                                        }).then((result) => {
                                            if (result.value) {
                                            location.href='<?=base_url("admin/hapus_nilai/".$n->id_tes);?>';
                                            }
                                        })
                                    }) 
                                })
                            </script>
                        </tr>
                        <?php }
                        } ?>
                    <?php endif; ?>                    
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>           

<script>
$(document).ready(function(){
    $('.table').DataTable({
      'paging' : true,
      'lengthChange' : true,
      'searching' : true,
      'ordering' : false,
      'info' : true,
      'autoWidth' : false        
    });
    $('#pilihmapel').on('change', function(){
        var id = $(this).val();
        location.href = '<?=base_url("nilai/".$kelas['id_kelas']."/");?>'+id;
    });   
})
</script>