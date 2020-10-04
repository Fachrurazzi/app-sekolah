<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">
            Data Motor
        </h1>
    </section>

    <section class="content">
        <div class="box box-purple">
            <div class="box-header with-border">
                <button type="button" data-toggle="modal" data-target="#tambahMotor" class="btn btn-sm btn-flat btn-success"><i class="fa fa-user-plus"></i> Tambah Data Motor</button>

                <!-- Modal Tambah Siswa -->
                <div class="modal fade" id="tambahMotor">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-user"></i> Tambah Data Motor</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_motor');?>" method="post" role="form" enctype="multipart/form-data" id="form-modal">
                                    <div class="box-body">
                                        <div class="col-sm-6 form-group">
                                            <label for="kode_motor">Kode motor :</label>
                                            <input type="text" name="kode_motor" class="form-control" placeholder="Masukkan Kode Motor...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="merk">Merk Motor :</label>
                                            <input type="text" name="merk" class="form-control" placeholder="Masukkan Merk Motor...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="jenis">Jenis Motor :</label>
                                            <input type="text" name="jenis" class="form-control" placeholder="Masukkan Jenis Motor...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="nopol">No.Polisi :</label>
                                            <input type="text" name="nopol" class="form-control" placeholder="Masukkan  Nomor Polisi...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="warna">warna motor :</label>
                                            <input type="text" name="warna" class="form-control" placeholder="Masukkan warna motor...">
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
                <table id="tabelMotor" class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Kode Motor</th>
                            <th class="text-center">Merk</th>
                            <th class="text-center">Jenis Motor</th>
                            <th class="text-center">No.Polisi</th>
                            <th class="text-center">Warna Motor</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($motor as $s){
                        ?>
                        <tr>
                            <td  class="text-center"><?= $no++;?></td>
                            <td><?= $s->kode_motor;?></td>
                            <td><?= $s->merk;?></td>
                            <td  class="text-center"><?= $s->jenis;?></td>
                            <td><?= $s->nopol;?></td>
                            <td><?= $s->warna;?></td>
                            <td class="text-center">
                                <button type="button" data-toggle="modal" data-target="#editMotor<?= $s->id_motor;?>" class="btn btn-xs btn-warning" href="#"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button type="button" data-toggle="modal" data-target="#hapusMotor<?= $s->id_motor;?>" class="btn btn-xs btn-danger" href="#"><i class="fa fa-user-times"></i> Hapus</button>                                
                            </td>
                        </tr>
                        
                        <!-- Modal Edit Siswa -->
                        <div id="editMotor<?= $s->id_motor;?>" class="modal fade">
                                    <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-user"></i> Edit Data Motor</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/edit_motor/'.$s->id_motor);?>" method="post" enctype="multipart/form-data">
                                            <div class="box-body">
                                                <div class="col-sm-6 form-group">
                                                    <label for="kode_motor">Kode Motor :</label>
                                                    <input type="text" name="kode_motor" value="<?=$s->kode_motor;?>" class="form-control" required>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="merk">Merk Motor :</label>
                                                    <input type="text" name="merk" class="form-control" placeholder="Masukkan Merk Motor..." value="<?= $s->merk;?>" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="jenis">Jenis Motor :</label>
                                                    <input type="text" name="jenis" class="form-control" placeholder="Masukkan Jenis Motor..." value="<?= $s->jenis;?>" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="nopol">No.Polisi :</label>
                                                    <input type="text" name="nopol" class="form-control" placeholder="Masukkan Nomor Polisi..." value="<?= $s->nopol;?>" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="warna">Warna Motor :</label>
                                                    <input type="text" name="warna" class="form-control" placeholder="Masukkan Warna Motor..." value="<?= $s->warna;?>" required>
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

                        <!-- Modal Hapus Data Guru -->
                                <div class="modal fade" id="hapusMotor<?= $s->id_motor;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Data Motor</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <h4>Anda yakin akan menghapus <b><?= $s->kode_motor;?></b> ?</h4>
                                                    <p class="text-danger">*Menghapus data terpilih dapat menghapus semua data yang terkait </p>
                                                </div>
                                                <div class="box-footer">
                                                    <a href="<?= base_url('admin/hapus_motor/'.$s->id_motor);?>" class="btn btn-danger">Ya</a> &nbsp;
                                                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End Modal-->
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
    $('#tabelMotor').DataTable({
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
            url: "<?= site_url('admin/tambah_motor');?>",
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
                    window.location.href = "<?= site_url('motor'); ?>"
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