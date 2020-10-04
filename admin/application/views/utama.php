  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        Selamat Datang <?= $this->session->nama;?>!
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php
    if($this->session->status == 'guru') {
      if($passwdguru['username'] == $this->session->nama || $passwdguru['password'] == $this->session->nama){
      ?>
      <div class="alert alert-danger alert-dismissable">
        <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-lock"></i> Password Default</h4>
        Anda masih menggunakan username dan password default, silahkan ubah demi kenyamanan anda. 
        <a href="<?=base_url('setting');?>">Klik Disini !</a>
      </div>
      <?php } 
    } ?>

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$jmlmapel;?></h3>

              <p>Mata Pelajaran</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="<?=base_url('mapel');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$jmlguru;?></h3>

              <p>Guru</p>
            </div>
            <div class="icon">
              <i class="fa fa-th-large"></i>
            </div>
            <a href="<?=base_url('guru');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$jmlsiswa;?></h3>

              <p>Siswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?=base_url('siswa');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$jmlkelas;?></h3>

              <p>Kelas</p>
            </div>
            <div class="icon">
              <i class="fa fa-th"></i>
            </div>
            <a href="<?=base_url('kelas');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-8">
          <div class="box box-purple">
            <div class="box-header with-border">
              <h4 class="box-title">VISI</h4>
            </div>

            <div class="box-body">
              <p>Berprestasi, Berkarakter dan Peduli Lingkungan.</p>
              <br><br><br><br><br><br><br>
            </div>

            <div class="box-header with-border">
              <h4 class="box-title">MISI</h4>
            </div>
            <div class="box-body">
              <p>1. Menenumbuhkan semangat berprestasi terhadap seluruh angggota/warga sekolah. <br>
                2. Membantu siswa untuk mengenal potensi dirinya sehingga dapat berkembang secara optimal. <br>
                3. Mendorong siswa dalam menginternalisasikan ajaran agama sehingga berakhlak mulia. <br>
                4. Menndorong lulusan yang berkualitas dan berkarakter positif. <br>
              5. Menumbuhkan kesadaran dan peduli terhadap lingkungan alam sekitar.</p>
            </div>
          </div>          
        </div>

        <div class="col-md-4">

          <div class="box box-purple">
            <div class="box-header with-border">
              <h3 class="box-title">STRUKTUR ORGANISASI</h3>
            </div>

            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="./../assets/adminlte/dist/img/avatar5.png" class="img-circle" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Kepala Sekolah
                      <span class="product-description">
                        Ernawansyah, S.Pd
                      </span>
                    </a>
                  </div>
                </li>

                <li class="item">
                  <div class="product-img">
                    <img src="./../assets/adminlte/dist/img/avatar5.png" class="img-circle" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Wakil Kepala Sekolah
                      <span class="product-description">
                          Akhmad Gazali, S.Pd
                      </span>
                    </a>                        
                  </div>
                </li>

                <li class="item">
                  <div class="product-img">
                    <img src="./../assets/adminlte/dist/img/avatar3.png" class="img-circle" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Kepala Tata Usaha<span>
                      <span class="product-description">
                          Hj. Nurul Muhda, S.Pd
                      </span>
                    </a>
                  </div>
                </li>

                <li class="item">
                  <div class="product-img">
                    <img src="./../assets/adminlte/dist/img/avatar3.png" class="img-circle" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Kepala Perpustakaan
                      <span class="product-description">
                        Muniroh, S.Pd
                      </span>
                    </a>                        
                  </div>
                </li>

                <li class="item">
                  <div class="product-img">
                    <img src="./../assets/adminlte/dist/img/avatar5.png" class="img-circle" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Kepala Laboratorium
                      <span class="product-description">
                        Irwan Ihsan, S.Pd
                      </span>
                    </a>                        
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>         

        <div class="col-md-6">
          <div class="box box-purple">
            <div class="box-header with-border">
              <h4 class="box-title">DENAH LOKASI</h4>
            </div>            
            
            <div class="box-body">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.3046736535375!2d115.30936781475562!3d-2.4047613982475236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de5470a6a2198bd%3A0xbee79d741b7459e1!2sSMP%20Negeri%205%20Amuntai!5e0!3m2!1sen!2sus!4v1597980878330!5m2!1sen!2sus" width="100%" height="378" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>        
        </div>

        <div class="col-md-6">
          <div class="box box-purple">
            <div class="box-header with-border">
              <h4 class="box-title">SMP NEGERI 5 AMUNTAI</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-responsive pad" src="./../assets/img/smp-5-amuntai.jpg" alt="Photo">
            </div>
          </div>          
        </div>

    </section>
  </div>
