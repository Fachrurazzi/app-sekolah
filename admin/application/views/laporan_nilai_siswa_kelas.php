    <div class="content-wrapper">
        <section class="content-header">
            <h1 class="text-center">
                Laporan Nilai Siswa PerKelas
            </h1>
        </section>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <section class="content">
                    <div class="box box-purple">
                        <div class="box-body">
                            <form action="<?= base_url('cetak-nilai-siswa-kelas');?>" method="post" role="form" id="form">
                                <div class="form-group">
                                    <label for="cetak-kelas">Pilih Kelas :</label>
                                    <select class="form-control" name="cetak_kelas">
                                        <option selected disabled>Pilih Kelas...</option>
                                        <?php foreach($listkelas as $lk){ ?>
                                        <option value="<?= $lk->id_kelas;?>"><?= $lk->kode_kelas;?></option>
                                        <?php } ?>
                                    </select>
                                </div>                                
                                <div class="form-group">
                                    <label for="cetak-kelas">Pilih Mata Pelajaran :</label>
                                    <select id="cetak_mapel" name="cetak_mapel" class="form-control">
                                        <option selected disabled>Pilih Mata Pelajaran...</option>
                                        <?php foreach($listmapel as $lm){ ?>
                                        <option value="<?= $lm->id_mapel;?>" <?= $this->session->mapel == $lm->mapel ? 'selected' : '' ?>><?= $lm->mapel;?></option>
                                        <?php } ?>
                                    </select>                            
                                </div>
                                <div class="form-group">
                                    <label for="NamaSiswa">Jenis Ujian :</label>
                                    <select name="cetak_jenis" id="cetak_jenis" class="form-control">
                                        <option selected disabled>Jenis Ujian...</option>
                                        <option value="Ulangan-1">Ulangan 1</option>
                                        <option value="Ulangan-2">Ulangan 2</option>
                                        <option value="Ulangan-3">Ulangan 3</option>
                                        <option value="UTS">UTS</option>
                                        <option value="UAS">UAS</option>
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

    <script>
        $('#form').validate({
            rules : {
                cetak_kelas : "required",
                cetak_mapel : "required",
                cetak_jenis : "required"                                                
            },
            messages : {
                cetak_kelas : {
                    required : "Kolom masih kosong. Harap diisi",
                },
                cetak_mapel : {
                    required : "Kolom masih kosong. Harap diisi",
                },
                cetak_jenis : {
                    required : "Kolom masih kosong. Harap diisi",
                }                                           
            },
            errorElement: "em",
            errorPlacement: function ( error, element ) {
                // Add the `help_block` class to the error element
                error.addClass( "help-block" );
                error.insertAfter( element );
            },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
            },                
        });        
    </script>