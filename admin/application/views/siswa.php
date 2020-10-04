<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">
            Siswa
        </h1>
    </section>

    <section class="content">
        <div class="box box-purple">
            <div class="box-header with-border">
                <button type="button" data-toggle="modal" data-target="#tambahSiswa" class="btn btn-sm btn-flat btn-success"><i class="fa fa-user-plus"></i> Tambah Siswa</button>

                <!-- Modal Tambah Siswa -->
                <div class="modal fade" id="tambahSiswa">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-user"></i> Tambah Data Siswa</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_siswa');?>" method="post" role="form" enctype="multipart/form-data" id="form-modal">
                                    <div class="box-body">
                                        <div class="col-sm-6 form-group">
                                            <label for="nama">Nama Siswa :</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Siswa...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="nis">NIS :</label>
                                            <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS Siswa...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin :</label>
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                <option selected disabled="">Pilih Jenis Kelamin...</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>                                        

                                        <div class="col-sm-6 form-group">
                                            <label for="kelas">Kelas :</label>
                                            <select name="kelas" id="kelas" class="form-control" required>
                                                <option selected disabled="">Pilih Kelas...</option>
                                                <?php foreach($listkelas as $lk){ ?>
                                                <option value="<?= $lk->id_kelas;?>"><?= $lk->kode_kelas;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="tmpt_lahir">Tempat Lahir :</label>
                                            <input type="text" name="tmpt_lahir" class="form-control" placeholder="Masukkan  Tempat Lahir...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="tgl_lahir">Tanggal Lahir :</label>
                                            <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukkan  Tanggal Lahir...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="nohp">No. HP :</label>
                                            <input type="text" name="nohp" class="form-control" placeholder="Masukkan Nomor HP...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="tahun">Tahun Ajaran :</label>
                                            <input name="tahun" type="number" max="<?= intval(date('Y')); ?>" min="1999" value="<?= intval(date('Y')); ?>" class="form-control" required>
                                        </div>                                        

                                        <div class="col-sm-12 form-group">
                                            <label for="alamat">Alamat :</label>
                                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan  Alamat...">
                                        </div>

                                        <div class="col-sm-12 form-group">
                                            <label for="foto">Foto :</label>
                                            <input type="file" name="foto" class="form-control-file">
                                        </div>                                                                                
                                    </div>
                                    <div class="box-footer">
                                        <div class="col-sm-12 form-group">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Modal -->
            </div>
            <div class="box-body">
                <table id="tabelSiswa" class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIS</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Tempat Lahir</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">No HP</th>
                            <th class="text-center">Tahun Ajaran</th>
                            <th class="text-center">Info</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($siswa as $s){
                        ?>
                        <tr>
                            <td  class="text-center"><?= $no++;?></td>
                            <td><?= $s->nama;?></td>
                            <td><?= $s->nis;?></td>
                            <td  class="text-center"><?= $s->kode_kelas;?></td>
                            <td><?= $s->tmpt_lahir;?></td>
                            <td><?= format_hari_tanggal($s->tgl_lahir);?></td>
                            <td><?= $s->jenis_kelamin;?></td>
                            <td><?= $s->alamat;?></td>
                            <td><?= $s->nohp;?></td>
                            <td><?= $s->tahun_ajaran;?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#lihatPassword<?= $s->id_siswa;?>"><i class="fa fa-eye"></i> Lihat</button>
                            </td>
                            <td class="text-center">
                                <button type="button" data-toggle="modal" data-target="#editSiswa<?= $s->id_siswa;?>" class="btn btn-xs btn-warning" href="#"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button type="button" data-toggle="modal" data-target="#hapusSiswa<?= $s->id_siswa;?>" class="btn btn-xs btn-danger" href="#"><i class="fa fa-user-times"></i> Hapus</button>
                                <a target="_blank" class="btn btn-xs btn-success" href="<?= base_url('cetak_kartu/'.$s->id_siswa);?>"><i class="fa fa-print"></i> Cetak Kartu</a>                                 
                            </td>
                        </tr>
                        <!-- Modal Lihat Password Siswa -->
                        <div class="modal fade" id="lihatPassword<?= $s->id_siswa;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><i class="fa fa-user"></i> <?= $s->nama;?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="password">Password :</label>
                                            <input value="<?= $s->password;?>" type="text" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertanyaan">Pertanyaan :</label>
                                            <input type="text" value="<?= $s->pertanyaan;?>" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="jawaban">Jawaban :</label>
                                            <input type="text" value="<?= $s->jawaban;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Modal -->
                        <!-- Modal Edit Siswa -->
                        <div class="modal fade" id="editSiswa<?= $s->id_siswa;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-user"></i> Edit Data Siswa</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/edit_siswa/'.$s->id_siswa);?>" method="post" enctype="multipart/form-data">
                                            <div class="box-body">
                                                <div class="col-sm-6 form-group">
                                                    <label for="nama">Nama :</label>
                                                    <input type="text" name="nama" value="<?=$s->nama;?>" class="form-control" required>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="nis">NIS :</label>
                                                    <input type="text" name="nis" value="<?=$s->nis;?>" class="form-control" required>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="jenis_kelamin">Jenis Kelamin :</label>
                                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin_edit">
                                                        <option value="Laki-Laki" <?= $s->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
                                                        <option value="Perempuan" <?= $s->jenis_kelamin == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="kelas">Kelas :</label>
                                                    <select name="kelas" id="kelas_edit" class="form-control">
                                                        <option value="<?=$s->kelas;?>" selected><?=$s->kode_kelas;?></option>
                                                        <?php foreach($listkelas as $lk){ ?>
                                                        <option value="<?=$lk->id_kelas;?>"><?=$lk->kode_kelas;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="tmpt_lahir">Tempat Lahir :</label>
                                                    <input type="text" name="tmpt_lahir" class="form-control" placeholder="Masukkan  Tempat Lahir..." value="<?= $s->tmpt_lahir;?>" required>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="tgl_lahir">Tanggal Lahir :</label>
                                                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukkan  Tanggal Lahir..." value="<?= $s->tgl_lahir; ?>" required>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="nohp">No. HP :</label>
                                                    <input type="text" name="nohp" value="<?=$s->nohp;?>" class="form-control" required>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="tahun">Tahun Ajaran :</label>
                                                    <input name="tahun" type="number" max="<?= intval(date('Y')); ?>" min="1999" value="<?= $s->tahun_ajaran == intval(date('Y')) ? $s->tahun_ajaran : intval(date('Y'))  ?>" class="form-control" required>
                                                </div>

                                                <div class="col-sm-12 form-group">
                                                    <label for="alamat">Alamat :</label>
                                                    <input type="text" name="alamat" class="form-control" placeholder="Masukkan  Alamat..." value="<?= $s->alamat ?>" required>
                                                </div>


                                                <div class="col-sm-12 form-group">
                                                    <label for="foto">Foto :</label>
                                                    <input type="file" name="foto" class="form-control-file">
                                                    <input type="text" name="foto_lama" class="form-control" value="<?= $s->foto; ?>">
                                                </div>                                                


                                                <div class="col-sm-12 form-group">
                                                    <label for="password">Password :</label>
                                                    <input type="text" name="password" value="<?=$s->password;?>" class="form-control" required>
                                                </div>

                                                <div class="col-sm-12 form-group">
                                                    <label for="pertanyaan">Pertanyaan :</label>
                                                    <input type="text" name="pertanyaan" value="<?=$s->pertanyaan;?>" class="form-control" required>
                                                </div>

                                                <div class="col-sm-12 form-group">
                                                    <label for="Jawaban">Jawaban :</label>
                                                    <input type="text" name="jawaban" value="<?=$s->jawaban;?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <div class="col-sm-12 form-group">    
                                                    <button type="submit" class="btn btn-success"> <i class="fa fa-edit"></i> Edit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Hapus Siswa -->
                        <div class="modal fade" id="hapusSiswa<?= $s->id_siswa;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Data Siswa</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <h4>Anda yakin untuk menghapus siswa <b><?=$s->nama;?></b> ?</h4>
                                            <p class="text-danger">*Menghapus data siswa terpilih akan menghapus semua data yang terkait seperti nilai dan yang lainnya...</p>
                                        </div>
                                        <div class="box-footer">
                                            <a href="<?=base_url('admin/hapus_siswa/'.$s->id_siswa);?>" class="btn btn-danger">Ya</a> &nbsp;
                                            <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Modal -->
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<script>
$(document).ready(function(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });    
    $('#tabelSiswa').DataTable({
      'paging' : true,
      'lengthChange' : true,
      'searching' : true,
      'ordering' : false,
      'info' : true,
      'autoWidth' : false
    });
    $(document).on('submit', '#form-modal', function(e){
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('admin/tambah_siswa');?>",
            method: "POST",      
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType: "JSON",
            beforeSend: function() {
                $(':input[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                if(response.status == "success"){
                    Toast.fire({
                        type: 'success',
                        title: 'Berhasil Menyimpan.'
                    });
                    window.location.href = "<?= site_url('siswa'); ?>"
                } else {
                    msg = ""
                    if(response.msg) {
                        $.each(response.msg,function(i,v){
                            msg += '* ' + response.msg[i] + '<br>';
                        });
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            html: msg,
                        });
                    }
                }
                $(':input[type="submit"]').prop('disabled', false);
            },
            error: function() {
                Toast.fire({
                    type: 'error',
                    title : '<p style="color:red; font-size:12px;">Kesalahan Internal.</p>'
                });
                $(':input[type="submit"]').prop('disabled', false);
            }
        });
    });

    <?php if ($this->session->flashdata('add')) : ?>
        Toast.fire({type: 'success',title: 'Berhasil Menyimpan.'});
    <?php elseif ($this->session->flashdata('edit')) : ?>
        Toast.fire({type: 'success',title: 'Berhasil Diedit.'});
    <?php elseif ($this->session->flashdata('delete')) : ?>
        Toast.fire({type: 'success',title: 'Berhasil dihapus.'});
    <?php endif; ?>
})
</script>