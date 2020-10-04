<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Tambah Soal</h1>
    </section>

    <section class="content">
        <div class="box box-purple">
            <div class="box-header">
                        <!-- <input class="form-control" name="nama_soal" id="input-tags"></input> -->
                <a href="<?= site_url('');?>" class="btn btn-sm btn-success"><i class="fa fa-angle-left"></i>  Kembali</a>
            </div>
            <div class="box-body">
                <form action="admin/act_tsoal" enctype="multipart/form-data" method="POST" id="form-modal">
                    <?php if($this->session->status == 'admin') : ?>
                    <div class="col-md-2 form-group">
                        <label for="mapel">Mata Pelajaran :</label>
                        <select name="mapel" id="id_mapel" class="form-control" placeholder="Pilih Mata Pelajaran...">
                            <option value="">Pilih Mata Pelajaran...</option>
                            <?php foreach($listmapel as $lm){ ?>
                            <option value="<?= $lm->id_mapel;?>"><?= $lm->mapel;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-5 form-group">
                        <label for="input-kelas">Kelas :</label>
                        <select id="input-kelas" name="input_kelas" multiple placeholder="Pilih Kelas..." required></select>
                        <input type="hidden" name="id_kelas" id="id_kelas">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="guru">Guru :</label>
                        <select name="guru" id="id_guru" class="form-control" placeholder="Pilih Guru...">
                            <option value="">Pilih Guru...</option>
                            <?php foreach($listguru as $lg){ ?>
                            <option value="<?= $lg->id_guru;?>"><?= $lg->nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="kategori">Kategori :</label>
                        <select name="kategori" id="id_kategori" class="form-control" placeholder="Pilih Kategori...">
                            <option value="">Pilih Kategori...</option>
                            <?php foreach($listkategori as $lkt){ ?>
                            <option value="<?= $lkt->id_kategori;?>"><?= $lkt->kategori;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="nama_soal">Nama Soal :</label>
                        <input class="form-control" name="nama_soal" placeholder="Nama Soal...">
                    </div>              
                    <?php else : ?>
                    <div class="col-md-5 form-group">
                        <label for="input-kelas">Kelas :</label>
                        <select id="input-kelas" name="input_kelas" multiple></select>
                        <input type="hidden" name="id_kelas" id="id_kelas">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="kategori">Kategori Soal :</label>
                        <select name="kategori" id="id_kategori" class="form-control">
                            <option selected disabled>Pilih Kategori Soal...</option>
                            <?php foreach($listkategori as $lkt){ ?>
                            <option value="<?= $lkt->id_kategori;?>"><?= $lkt->kategori;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="nama_soal">Nama Soal :</label>
                        <input class="form-control" name="nama_soal" placeholder="Nama Soal..." required></input>
                    </div>                        
                    <?php endif; ?>
                    <div class="col-md-12 form-group">
                        <label for="soal">Soal :</label>
                        <textarea id="fieldSoal" name="soal"></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="media">Media :</label>
                        <input type="file" name="media">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="a">Opsi A</label>
                        <input type="text" name="a" class="form-control" placeholder="Jawaban A">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="b">Opsi B</label>
                        <input type="text" name="b" class="form-control" placeholder="Jawaban B">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="c">Opsi C</label>
                        <input type="text" name="c" class="form-control" placeholder="Jawaban C">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="d">Opsi D</label>
                        <input type="text" name="d" class="form-control" placeholder="Jawaban D">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="jawaban">Jawaban</label>
                        <select name="jawaban" id="" class="form-control">
                            <option value="" selected disabled>Pilih Jawaban...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        <input type="hidden" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success" id="btnBuat"><i class="fa fa-save"></i> Buat Soal</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script async="defer">
$(document).ready(function(){
    $('#form-modal').validate({
        rules : {
            mapel : "required",
            id_kelas : "required",            
            guru : "required",
            kategori : "required",
            nama_soal : "required",
            soal : "required",
            a : "required",                                                
            b : "required",                                                
            c : "required",                                                
            d : "required",                                                 
            jawaban : "required"
        },
        messages : {
            mapel : {
                required : "Kolom masih kosong. Harap diisi",
            },
            id_kelas : {
                required : "Kolom masih kosong. Harap diisi",
            },
            guru : {
                required : "Kolom masih kosong. Harap diisi",
            },
            kategori : {
                required : "Kolom masih kosong. Harap diisi",
            },
            nama_soal : {
                required : "Kolom masih kosong. Harap diisi",
            },
            soal : {
                required : "Kolom masih kosong. Harap diisi",
            },            
            a : {
                required : "Kolom masih kosong. Harap diisi",
            },
            b : {
                required : "Kolom masih kosong. Harap diisi",
            },
            c : {
                required : "Kolom masih kosong. Harap diisi",
            },
            d : {
                required : "Kolom masih kosong. Harap diisi",
            },           
            jawaban : {
                required : "Kolom masih kosong. Harap diisi",
            }      
        },
        ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );
            error.insertAfter( element );
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-md-2.form-group" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).parents( ".col-md-3.form-group" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).parents( ".col-md-4.form-group" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).parents( ".col-md-5.form-group" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).parents( ".col-md-6.form-group" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).parents( ".col-md-8.form-group" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).parents( ".col-md-12.form-group" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-md-2.form-group" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).parents( ".col-md-3.form-group" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).parents( ".col-md-4.form-group" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).parents( ".col-md-5.form-group" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).parents( ".col-md-6.form-group" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).parents( ".col-md-8.form-group" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).parents( ".col-md-12.form-group" ).addClass( "has-success" ).removeClass( "has-error" );
        },                
    });
      $.ajax({
        url: '<?= base_url('admin/get_kelas') ?>',
        success: function(data){
            var kelasOpt = JSON.parse(data);
            var $selectizeAPI = $('#input-kelas').selectize({
                options: kelasOpt,
                valueField: 'value',
                labelField: 'label',
                searchField: 'label',
                maxItems: 20,
                items: [],
                create: false,
                onChange: function(val){
                    var kelas = this.items.join(',');
                    $('#id_kelas').val(kelas);
                }
          });
        }
      })
      
    CKEDITOR.replace('fieldSoal');

    <?php
    if ($this->session->flashdata('soal')) { ?>
        Swal.fire('Sukses!', 'Soal berhasil ditambahkan', 'success');
    <?php
    }
    ?>    
});
</script>

<!-- CK Editor -->
<script src="<?= base_url('./../assets/adminlte/bower_components/ckeditor/ckeditor.js');?>"></script>