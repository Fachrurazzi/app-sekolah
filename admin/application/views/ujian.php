<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">Ujian</h1>
    </section>

    <section class="content">
        <div class="box box-puple">
            <div class="box-header with-border">  
                <button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#tambahUjian"><i class="fa fa-plus"></i> Tambah Ujian</button>
                
                <div class="modal fade" id="tambahUjian">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-list"></i> Tambah Ujian</h4>
                            </div>
                            <div class="modal-body">
                                <form id="form-modal">
                                    <div class="box-body">
                                        <div class="col-sm-6 form-group">
                                            <label for="nmujian">Jenis Ujian :</label>
                                            <select class="form-control" name="nmujian" id="nmujian">
                                                <option selected disabled>Jenis Ujian...</option>
                                                <option value="Ulangan-1">Ulangan 1</option>
                                                <option value="Ulangan-2">Ulangan 2</option>
                                                <option value="Ulangan-3">Ulangan 3</option>
                                                <option value="UTS">UTS</option>
                                                <option value="UAS">UAS</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="kelas">Kelas :</label>
                                            <select name="kelas" id="pilihkelas" class="form-control" id="pilihkelas">
                                                <option selected disabled>Pilih Kelas...</option>
                                                <?php foreach ($listkelas as $lk) { ?>
                                                <option value="<?= $lk->id_kelas;?>"><?= $lk->kode_kelas;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="mapel">Mata Pelajaran :</label>
                                            <select name="mapel" id="mapel" class="form-control">
                                                <option disabled selected>Pilih Mapel...</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="guru">Pengawas :</label>
                                            <select name="guru" class="form-control" id="guru">
                                                <option disabled selected>Pilih Pengawas...</option>
                                                <?php foreach($listguru as $lg){ ?>
                                                <option value="<?= $lg->id_guru;?>"><?= $lg->nama;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="tanggal_mulai">Tanggal Mulai :</label>
                                            <input type="date" name="tanggal_mulai" class="form-control">
                                        </div>
                                        <div class=" col-sm-6 form-group">
                                            <label for="jam_mulai">Jam Mulai :</label>
                                            <input type="text" name="jam_mulai" class="form-control" placeholder="Jam Mulai">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="waktu">Waktu :</label>
                                            <input type="text" name="waktu" class="form-control" placeholder="Menit">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="jumlah">Jumlah Soal :</label>
                                            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Soal">
                                        </div>                                         
                                    </div>
                                    <div class="box-footer">
                                        <div class="col-lg-12 form-group">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Tambah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">

                <table id="table-ujian" class="table table-bordered table-striped table-hover table-responsive">
                    <thead class="text-center">
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Jenis Ujian</th>
                            <th class="text-center">Mata Pelajaran</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Pengawas</th>
                            <th class="text-center">Jumlah Soal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($listujian as $lu) { ?>
                        <tr>
                            <td class="text-center"><?=$no++;?>.</td>
                            <td><?= periode($lu->tanggal_mulai). ' - '.date('H:i', strtotime($lu->tanggal_selesai));?></td>
                            <td><?=$lu->waktu;?> Menit</td>
                            <td><?=$lu->nama_ujian;?></td>
                            <td><?=$lu->mapel;?></td>
                            <td class="text-center"><?=$lu->kode_kelas;?></td>
                            <td><?=$lu->nama;?></td>
                            <td class="text-center"><?=$lu->jumlah_soal;?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit<?=$lu->id_ujian;?>"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapusujian<?=$lu->id_ujian;?>"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="edit<?=$lu->id_ujian;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-list"></i> Edit Ujian</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="admin/edit_ujian/<?=$lu->id_ujian;?>" method="POST">
                                            <div class="box-body">
                                                <div class="col-sm-6 form-group">
                                                    <label for="nmujian">Jenis Ujian :</label>
                                                    <select class="form-control" name="nmujian" id="nmujian_edit">
                                                        <option selected disabled>Jenis Ujian...</option>
                                                        <option value="Ulangan-1" <?= $lu->nama_ujian == 'Ulangan-1' ? 'selected' : '' ?>>Ulangan 1</option>
                                                        <option value="Ulangan-2" <?= $lu->nama_ujian == 'Ulangan-2' ? 'selected' : '' ?>>Ulangan 2</option>
                                                        <option value="Ulangan-3" <?= $lu->nama_ujian == 'Ulangan-3' ? 'selected' : '' ?>>Ulangan 3</option>
                                                        <option value="UTS" <?= $lu->nama_ujian == 'UTS' ? 'selected' : '' ?>>UTS</option>
                                                        <option value="UAS" <?= $lu->nama_ujian == 'UAS' ? 'selected' : '' ?>>UAS</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="kelas">Kelas :</label>
                                                    <select name="kelas" id="editkelas" class="form-control">
                                                        <?php foreach ($listkelas as $lk) { ?>
                                                        <option value="<?= $lk->id_kelas;?>" <?= $lk->id_kelas == $lu->id_kelas ? 'selected' : '' ?>><?= $lk->kode_kelas;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="mapel">Mata Pelajaran :</label>
                                                    <select name="mapel" id="mapeledit" class="form-control">
                                                        <option value="<?=$lu->id_mapel;?>"><?=$lu->mapel;?></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="guru">Pengawas :</label>
                                                    <select name="guru" class="form-control" id="guru_edit">
                                                        <option value="<?=$lu->id_guru;?>"><?=$lu->nama;?></option>
                                                        <?php foreach($listguru as $lg){ ?>
                                                        <option value="<?= $lg->id_guru;?>"><?= $lg->nama;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="tanggal_mulai">Tanggal Mulai :</label>
                                                    <input type="date" name="tanggal_mulai" class="form-control" value="<?= date('Y-m-d', strtotime($lu->tanggal_mulai)) ?>">
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="jam_mulai">Jam Mulai :</label>
                                                    <input type="text" name="jam_mulai" class="form-control" placeholder="Jam Mulai" value="<?= date('H:i', strtotime($lu->tanggal_mulai))?>">
                                                </div>                                                           
                                                <div class="col-sm-6 form-group">
                                                    <label for="waktu">Waktu :</label>
                                                    <input type="text" name="waktu" class="form-control" placeholder="Menit" value="<?=$lu->waktu;?>">
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="jumlah">Jumlah Soal :</label>
                                                    <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Soal" value="<?= $lu->jumlah_soal ?>">
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <div class="col-lg-12 form-group">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="hapusujian<?=$lu->id_ujian;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Ujian</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <h4>Anda yakin akan menghapus ujian <?=$lu->nama_ujian;?>?</h4>
                                            <p class="text-danger">*Menghapus ujian terpilih akan menghapus semua data yang terkait seperti nilai dan yang lainnya...</p>
                                        </div>
                                        <div class="box-footer">
                                            <a href="<?= base_url('admin/hapus_ujian/'.$lu->id_ujian);?>" class="btn btn-danger">Ya</a> &nbsp;
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

<script>
$(document).ready(function(){
    // $('#form-modal').validate({
    //     rules : {
    //         nmujian : "required",
    //         kelas : "required",
    //         mapel : "required",            
    //         guru : "required",
    //         tanggal_mulai : "required",
    //         jam_mulai : "required",
    //         waktu : "required",                                         
    //         jumlah : "required",                                         
    //     },
    //     messages : {
    //         nmujian : {
    //             required : "Kolom masih kosong. Harap diisi"
    //         },
    //         kelas : {
    //             required : "Kolom masih kosong. Harap diisi"
    //         },        
    //         mapel : {
    //             required : "Kolom masih kosong. Harap diisi"
    //         },
    //         guru : {
    //             required : "Kolom masih kosong. Harap diisi"
    //         },
    //         tanggal_mulai : {
    //             required : "Kolom masih kosong. Harap diisi"
    //         },
    //         jam_mulai : {
    //             required : "Kolom masih kosong. Harap diisi"
    //         },
    //         waktu : {
    //             required : "Kolom masih kosong. Harap diisi"
    //         },
    //         jumlah : {
    //             required : "Kolom masih kosong. Harap diisi"
    //         },                                                             
    //     },
    //     errorElement: "em",
    //     errorPlacement: function ( error, element ) {
    //         // Add the `help-block` class to the error element
    //         error.addClass( "help-block" );
    //         error.insertAfter( element );
    //     },
    //     highlight: function ( element, errorClass, validClass ) {
    //         $( element ).parents( ".col-sm-6.form-group" ).addClass( "has-error" ).removeClass( "has-success" );
    //         $( element ).parents( ".col-sm-12.form-group" ).addClass( "has-error" ).removeClass( "has-success" );
    //     },
    //     unhighlight: function (element, errorClass, validClass) {
    //         $( element ).parents( ".col-sm-6.form-group" ).addClass( "has-success" ).removeClass( "has-error" );
    //         $( element ).parents( ".col-sm-12.form-group" ).addClass( "has-success" ).removeClass( "has-error" );
    //     },                
    // });
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('#table-ujian').DataTable({
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
                url: "<?= site_url('admin/tambah_ujian');?>",
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
                        window.location.href = "<?= site_url('ujian'); ?>"
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

    $('#pilihkelas').on('change', function(){
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url("admin/mapel_by_kelas/");?>'+id,
            dataType: 'json',
            success: function(data){
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<option value="'+data[i].id_mapel+'">'+data[i].mapel+'</option>';
                }
                if (data) {
                    $('#mapel').html(html);
                }
                 if (data == '') {
                     var html = '<option>-- Belum Ada Soal --</option>';
                     $('#mapel').html(html);
                 }
            }
        })
    });
    
    $('#editkelas').on('change', function(){
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url("admin/mapel_by_kelas/");?>'+id,
            dataType: 'json',
            success: function(data){
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<option value="'+data[i].id_mapel+'">'+data[i].mapel+'</option>';
                }
                if (data) {
                    $('#mapeledit').html(html);
                }
                 if (data == '') {
                     var html = '<option>-- Belum Ada Soal --</option>';
                     $('#mapeledit').html(html);
                 }
            }
        })
    });

})
</script>