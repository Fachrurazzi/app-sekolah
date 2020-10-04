<style>
.highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
}

#container {
  height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
    font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
</style>
    <div class="content-wrapper">
        <section class="content-header">
            <h1 class="text-center">
                Laporan Grafik Nilai Siswa
            </h1>
        </section>
        <section class="content">
            <div class="box box-purple">
                <div class="box-header">  
                </div>
                <div class="box-body">
                <form class="form-inline">
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

                        <button type="button" class="show-chart btn btn-sm btn-success"> <i class="fa fa-eye"></i> Tampilkan</button>                                        
                </form>                    
                    <figure class="highcharts-figure">
                      <div id="container"></div>
                    </figure>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            // Create the chart
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

            function chart_grafik(data_grafik) {
              Highcharts.chart('container', {
                chart: {
                  type: 'column'
                },
                title: {
                  text: 'Grafik Nilai Siswa Perkelas'
                },
                subtitle: {
                  text: 'SMPN 5 AMUNTAI'
                },
                xAxis: {
                  type: 'category'
                },
                yAxis: {
                  title: {
                    text: 'Nilai'
                  }

                },
                legend: {
                  enabled: false
                },
                plotOptions: {
                  series: {
                    borderWidth: 0,
                    dataLabels: {
                      enabled: true,
                      format: '{point.y}'
                    }
                  }
                },
                credits: {
                  enabled: false
                },

                tooltip: {
                  headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                  pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
                },

                "series": [
                  {
                    "name": "Nilai",
                    "colorByPoint": true,
                    "data": data_grafik
                  }
                ]
              });
            }

            

            function load_chart_grafik(){
              var kelas = $('#kelas').val();
              var siswa = $('#siswa').val();
              $.ajax({
                url: "<?= site_url('admin/getGrafik') ?>",
                data : {
                  kelas: kelas,
                  siswa: siswa,
                },
                dataType: "JSON",
                success:function(data) {
                  chart_grafik(data);
                },
                error:function() {
                  alert("gagal");
                }
              })
            }

            load_chart_grafik();

            $(document).on('click', '.show-chart', function(){
              load_chart_grafik();
            })
        })
    </script>   