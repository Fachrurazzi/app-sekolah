<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">
            Buku
        </h1>
    </section>

    <section class="content">
        <div class="box box-purple">
            <div class="box-header with-border">
                <button type="button" data-toggle="modal" data-target="#tambahBuku" class="btn btn-sm btn-flat btn-success"><i class="fa fa-user-plus"></i> Tambah Buku</button>

                <!-- Modal Tambah Siswa -->
                <div class="modal fade" id="tambahBuku">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-user"></i> Tambah Data Buku</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_buku');?>" method="post" role="form" enctype="multipart/form-data" id="form-modal">
                                    <div class="box-body">
                                        <div class="col-sm-6 form-group">
                                            <label for="kode_buku">Kode Buku :</label>
                                            <input type="text" name="kode_buku" class="form-control" placeholder="Masukkan Kode Buku...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="judul">Judul Buku :</label>
                                            <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Buku...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="kategori">Kategori :</label>
                                            <input type="text" name="kategori" class="form-control" placeholder="Masukkan Kategori Buku...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="penerbit">Penerbit :</label>
                                            <input type="text" name="penerbit" class="form-control" placeholder="Masukkan  Tempat Lahir...">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label for="pengarang">Pengarang :</label>
                                            <input type="text" name="pengarang" class="form-control" placeholder="Masukkan Nomor HP...">
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
                <table id="tabelBuku" class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Kode Buku</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Penerbit</th>
                            <th class="text-center">Pengarang</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($buku as $s){
                        ?>
                        <tr>
                            <td  class="text-center"><?= $no++;?></td>
                            <td><?= $s->kode_buku;?></td>
                            <td><?= $s->judul;?></td>
                            <td  class="text-center"><?= $s->kategori;?></td>
                            <td><?= $s->penerbit;?></td>
                            <td><?= $s->pengarang;?></td>
                            <td class="text-center">
                                <button type="button" data-toggle="modal" data-target="#editBuku<?= $s->id_buku;?>" class="btn btn-xs btn-warning" href="#"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button type="button" data-toggle="modal" data-target="#hapusBuku<?= $s->id_buku;?>" class="btn btn-xs btn-danger" href="#"><i class="fa fa-user-times"></i> Hapus</button>                                
                            </td>
                        </tr>
                        
                        <!-- Modal Edit Siswa -->
                        <div class="modal fade" id="editBuku<?= $s->id_buku;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-user"></i> Edit Data Buku</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/edit_buku/'.$s->id_buku);?>" method="post" enctype="multipart/form-data">
                                            <div class="box-body">
                                                <div class="col-sm-6 form-group">
                                                    <label for="kode_buku">Kode Buku :</label>
                                                    <input type="text" name="kode_buku" value="<?=$s->kode_buku;?>" class="form-control" required>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="judul">Judul Buku :</label>
                                                    <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Buku..." value="<?= $s->judul;?>" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="kategori">Kategori :</label>
                                                    <input type="text" name="kategori" class="form-control" placeholder="Masukkan Kategori Buku..." value="<?= $s->kategori;?>" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="penerbit">Penerbit :</label>
                                                    <input type="text" name="penerbit" class="form-control" placeholder="Masukkan Penerbit Buku..." value="<?= $s->penerbit;?>" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="pengarang">Pengarang :</label>
                                                    <input type="text" name="pengarang" class="form-control" placeholder="Masukkan Pengarang Buku..." value="<?= $s->pengarang;?>" required>
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
                                <div class="modal fade" id="hapusBuku<?= $s->id_buku;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Data Buku</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <h4>Anda yakin akan menghapus <b><?= $s->kode_buku;?></b> ?</h4>
                                                    <p class="text-danger">*Menghapus data terpilih dapat menghapus semua data yang terkait seperti soal dan lainnya...</p>
                                                </div>
                                                <div class="box-footer">
                                                    <a href="<?= base_url('admin/hapus_buku/'.$s->id_buku);?>" class="btn btn-danger">Ya</a> &nbsp;
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
    $('#tabelBuku').DataTable({
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
            url: "<?= site_url('admin/tambah_buku');?>",
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
                    window.location.href = "<?= site_url('buku'); ?>"
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