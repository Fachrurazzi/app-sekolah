    <div class="content-wrapper">
        <section class="content-header">
            <h1 class="text-center">
                Laporan Nilai PerSiswa
            </h1>
        </section>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <section class="content">
                    <div class="box box-purple">
                        <div class="box-body">
                            <form action="<?= base_url('cetak-nilai-siswa');?>" method="post" role="form">
                                <div class="form-group">
                                    <label for="cetak-kelas">Pilih Kelas :</label>
                                    <select class="form-control" name="kelas" id="kelas" required="">
                                        <option selected disabled>Pilih Kelas...</option>
                                        <?php foreach($listkelas as $lk){ ?>
                                        <option value="<?= $lk->id_kelas;?>"><?= $lk->kode_kelas;?></option>
                                        <?php } ?>
                                    </select>
                                </div>                                
                                <div class="form-group">
                                    <label for="cetak-siswa">Pilih Siswa :</label>
                                    <select id="siswa" name="siswa" class="form-control">
                                        <option selected>Pilih Siswa...</option>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#kelas').change(function() {
                var kelas = $(this).val();
                $.ajax({
                    url : "<?= base_url('admin/get_siswa_perkelas') ?>",
                    method : "POST" ,
                    data : {kelas : kelas},
                    async : true,
                    dataType : 'json',
                    success : function(data) {
                        var html = '';
                        var i;
                        for(i=0; i< data.length; i++) {
                            html += '<option value='+data[i].id_siswa+'>'+data[i].nama+'</option>';
                        }
                        $('#siswa').html(html);
                    }
                });
                return false;
            });
        });
    </script>