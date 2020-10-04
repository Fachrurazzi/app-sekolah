<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">
            Kategori Soal
        </h1>
    </section>

    <section class="content">
        <div class="box box-purple">
            <div class="box-header">
                <button type="button" data-toggle="modal" data-target="#tambah-kategori" class="btn btn-sm btn-flat btn-success"><i class="fa fa-plus"></i> Tambah Kategori Soal</button>

                <!-- Modal Tambah Pelajaran -->
                <div class="modal fade" id="tambah-kategori">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-book"></i> Tambah Kategori Soal</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="form-modal">
                                    <div class="box-body">
                                        <div class="col-sm-12 form-group">
                                            <label for="kategori">Kategori Soal :</label>
                                            <input type="text" name="kategori" class="form-control" placeholder="Masukkan kategori soal...">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <div class="col-sm-12 form-group">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Modal Tambah Kategori Soal -->
            </div>
            <div class="box-body">
                <table id="tabelkategori" class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Kategori Soal</th>
                            <th class="text-center" style="width: 250px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($kategori as $k){
                        ?>
                        <tr>
                            <td class="text-center" style="width: 1px;"><?= $no++;?>.</td>
                            <td class="text-center"><?= $k->kategori; ?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editkategori<?= $k->id_kategori;?>"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapuskategori<?= $k->id_kategori;?>"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <!-- Modal Edit kategori -->
                        <div class="modal fade" id="editkategori<?= $k->id_kategori;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-book"></i> Edit Data Kategori Soal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/edit_kategori/'.$k->id_kategori);?>" method="post">
                                            <div class="box-body">
                                                <div class="col-sm-12 form-group">
                                                    <label for="kategori">Kategori Soal :</label>
                                                    <input type="text" name="kategori" class="form-control" value="<?= $k->kategori; ?>">
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <div class="col-sm-12 form-group">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Modal -->
                        <!-- Modal Hapus Kategori Soal -->
                        <div class="modal fade" id="hapuskategori<?= $k->id_kategori;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Kategori Soal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <h4>Anda yakin akan menghapus kategori soal <b><?= $k->kategori;?></b> ?</h4>
                                            <p class="text-danger">*Menghapus kategori soal terpilih dapat menghapus semua data yang terkait termasuk guru, soal, maupun nilai</p>
                                        </div>
                                        <div class="box-footer">
                                            <a href="<?= base_url('admin/hapus_kategori/'.$k->id_kategori);?>" class="btn btn-danger">Ya</a> &nbsp;
                                            <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('#tabelkategori').DataTable({
            'paging' : true,
            'lengthChange' : true,
            'searching' : true,
            'ordering' : false,
            'info' : true,
            'autoWidth' : false,                
        });
        $(document).on('submit', '#form-modal', function(e){
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('admin/tambah_kategori');?>",
                method: "POST",
                data: $(this).serialize(),
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
                        window.location.href = "<?= site_url('kategori'); ?>"
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