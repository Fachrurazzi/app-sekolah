<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title;?> | Aplikasi Ujian Berbasis Komputer</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">

	<link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css');?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('./../assets/adminlte/dist/css/AdminLTE.min.css');?>">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?=base_url('./../assets/adminlte/dist/css/skins/skin-blue-info.min.css');?>">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
	<!-- Daterange picker -->
	<!-- <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css');?>"> -->
	<!-- bootstrap wysihtml5 - text editor -->
	<!-- <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">   -->
	<!-- Select2 -->
	<link rel="stylesheet" href="<?=base_url('./../assets/adminlte/bower_components/select2/dist/css/select2.min.css');?>">
	<!-- Sweetalert -->
	<link rel="stylesheet" href="<?=base_url('./../assets/css/sweetalert2.min.css');?>">
	<!-- CSS -->
	<link rel="stylesheet" href="<?=base_url('./../assets/css/style-admin.css');?>">
	<link rel="stylesheet" href="<?=base_url('./../assets/css/selectize.css');?>">
	<link rel="stylesheet" href="<?=base_url('./../assets/css/selectize.bootstrap3.css');?>">
	<link rel="stylesheet" href="<?=base_url('./../assets/css/selectize.default.css');?>">
	<!-- <link rel="stylesheet" href="<?=base_url('./../assets/css/selectize.legacy.css');?>"> -->

	<!-- jQuery 3 -->
	<script src="<?= base_url('./../assets/adminlte/bower_components/jquery/dist/jquery.min.js');?>"></script>
	<script src="<?= base_url('./../assets/js/jquery.validate.min.js');?>"></script>
	<!-- DataTables -->
	<script src="<?= base_url('./../assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?= base_url('./../assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
	<!-- jQuery UI 1.11.4 -->
	<!-- <script src="<?= base_url('./../assets/adminlte/bower_components/jquery-ui/jquery-ui.min.js');?>"></script> -->
	<!-- Sweetalert -->
	<script src="<?=base_url('./../assets/js/sweetalert2.all.min.js');?>"></script>
	<script src="<?=base_url('./../assets/js/selectize.min.js');?>"></script>
	<script src="<?=base_url('./../assets/js/selectize.js');?>"></script>
	<script src="<?=base_url('./../assets/js/highcharts/highcharts.js');?>"></script>
	<script src="<?=base_url('./../assets/js/highcharts/modules/exporting.js');?>"></script>
	<script src="<?=base_url('./../assets/js/highcharts/modules/export-data.js');?>"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
	<header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url();?>" class="logo">
    	<!-- mini logo for sidebar mini 50x50 pixels -->
    	<span class="logo-mini"><b>CBT</b></span>
    	<!-- logo for regular state and mobile devices -->
    	<span class="logo-lg"><b>SMPN 5 AMUNTAI</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    	<!-- Sidebar toggle button-->
    	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    		<span class="sr-only">Toggle navigation</span>
    	</a>

    	<div class="navbar-custom-menu">
    		<ul class="nav navbar-nav">
    			<!-- User Account: style can be found in dropdown.less -->
    			<li class="dropdown user user-menu">
    				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    					<?php if($this->session->jenis_kelamin == 'Laki-Laki') : ?>
    						<img src="<?= base_url('./../assets/adminlte/dist/img/avatar5.png');?>" class="user-image" alt="User Image">
    					<?php elseif($this->session->jenis_kelamin == 'Perempuan') : ?>
    						<img src="<?= base_url('./../assets/adminlte/dist/img/avatar3.png');?>" class="user-image" alt="User Image">
    					<?php elseif($this->session->jabatan == 'Kepala Sekolah') : ?>
    						<img src="<?= base_url('./../assets/adminlte/dist/img/avatar5.png');?>" class="user-image" alt="User Image">
    					<?php elseif($this->session->jabatan == 'Administrator') : ?>
    						<img src="<?= base_url('./../assets/adminlte/dist/img/avatar3.png');?>" class="user-image" alt="User Image">
    					<?php else : ?>
    						<img src="<?= base_url('./../assets/img/user1.png');?>" class="user-image" alt="User Image">
    					<?php endif; ?>
    					<span class="hidden-xs">
    						<?=$this->session->nama;?>
						</span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
	    					<?php if($this->session->jenis_kelamin == 'Laki-Laki') : ?>
	    						<img src="<?= base_url('./../assets/adminlte/dist/img/avatar5.png');?>" class="img-circle" alt="User Image">
	    					<?php elseif($this->session->jenis_kelamin == 'Perempuan') : ?>
	    						<img src="<?= base_url('./../assets/adminlte/dist/img/avatar3.png');?>" class="img-circle" alt="User Image">
	    					<?php elseif($this->session->jabatan == 'Kepala Sekolah') : ?>
	    						<img src="<?= base_url('./../assets/adminlte/dist/img/avatar5.png');?>" class="img-circle" alt="User Image">
	    					<?php elseif($this->session->jabatan == 'Administrator') : ?>
	    						<img src="<?= base_url('./../assets/adminlte/dist/img/avatar3.png');?>" class="img-circle" alt="User Image">
	    					<?php else : ?>
	    						<img src="<?= base_url('./../assets/img/user1.png');?>" class="img-circle" alt="User Image">
	    					<?php endif; ?>
							<p>
								<?= $this->session->nama;?>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?= base_url('setting');?>" class="btn btn-warning btn-flat"><i class="fa fa-gear"></i> Setting</a>
							</div>
							<div class="pull-right">
								<a href="<?= base_url('admin/logout');?>" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?= base_url('./../assets/img/smp.png');?>"  alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?=ucfirst($this->session->nama);?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu tree" data-widget="tree">
				<li class="header text-aqua">MAIN MENU</li>
				<li <?= $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
					<a href="<?= base_url();?>"><i class="fa fa-dashboard text-aqua"></i><span>Dashboard</span></a>
				</li>    
				<?php
				//Menu navigasi admin
				if($this->session->status == 'admin'){ ?>
					<li class="treeview <?= $this->uri->segment(1) == 'kelas' ? 'active' : '' || $this->uri->segment(1) == 'mapel' ? 'active' : '' || $this->uri->segment(1) == 'guru' ? 'active' : '' || $this->uri->segment(1) == 'siswa' ? 'active' : ''?>">
						<a href="#">
							<i class="fa fa-folder text-aqua"></i> 
							<span>
								Data Master
							</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="<?= $this->uri->segment(1) == 'guru' ? 'active' : '' ?>">
								<a href="<?= base_url('guru') ?>">
									<i class="fa fa-circle-o"></i> Master Guru
								</a>
							</li>
							<li class="<?= $this->uri->segment(1) == 'siswa' ? 'active' : '' ?>">
								<a href="<?= base_url('siswa') ?>">
									<i class="fa fa-circle-o"></i> Master Siswa
								</a>
							</li>
							<li class="<?= $this->uri->segment(1) == 'kelas' ? 'active' : '' ?>">
								<a href="<?= base_url('kelas') ?>">
									<i class="fa fa-circle-o"></i> Master Kelas
								</a>
							</li>
							<li class="<?= $this->uri->segment(1) == 'mapel' ? 'active' : '' ?>">
								<a href="<?= base_url('mapel') ?>">
									<i class="fa fa-circle-o"></i> Master Mata Pelajaran
								</a>
							</li>
							<li class="<?= $this->uri->segment(1) == 'buku' ? 'active' : '' ?>">
								<a href="<?= base_url('buku') ?>">
									<i class="fa fa-circle-o"></i> Master Buku
								</a>
							</li>
							<li class="<?= $this->uri->segment(1) == 'motor' ? 'active' : '' ?>">
								<a href="<?= base_url('motor') ?>">
									<i class="fa fa-circle-o"></i> Master Motor
								</a>
							</li>
						</ul>
					</li>
					<li class="header text-aqua">MASTER SOAL</li>
					<li class="treeview <?= $this->uri->segment(1) == 'kategori' ? 'active' : '' || $this->uri->segment(1) == 'tsoal' ? 'active' : ''?>">
						<a href="#"><i class="fa fa-cube text-aqua"></i> 
							<span>Data Soal</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="<?= $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>">
								<a href="<?= base_url('kategori') ?>">
									<i class="fa fa-circle-o"></i> Kategori
								</a>
							</li>
							<li class="<?= $this->uri->segment(1) == 'tsoal' ? 'active' : '' ?>">
								<a href="<?= base_url('tsoal') ?>">
									<i class="fa fa-circle-o"></i> Buat Soal
								</a>
							</li>
						</ul>
					</li>      
					<!-- Menu Soal -->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-file-text-o text-aqua"></i> 
							<span>Bank Soal</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<?php foreach($perkelas as $pk){ ?>
								<li class="treeview">
									<a href="#"><i class="fa fa-circle-o"></i> Kelas <?=$pk->kelas;?> 
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<?php $where = array('kelas' => $pk->kelas); 
										$perkelasjurusan = $this->m_admin->perkelasjurusan($where)->result();
										foreach($perkelasjurusan as $pkj){ ?>
											<li class="<?= $this->uri->segment(2) == $pkj->id_kelas ? 'active' : '' ?>">
												<a href="<?=base_url('soal/'.$pkj->id_kelas);?>"><?=$pkj->kode_kelas;?></a>
											</li>
											<?php } ?>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</li> 
					<!-- End Menu Soal -->
					
					<li class="header text-aqua"> MASTER UJIAN</li>
					<li <?= $this->uri->segment(1) == 'ujian' ? 'class="active"' : '' ?>>
						<a href="<?= base_url('ujian');?>"><i class="fa fa-th-list text-aqua"></i>
							<span>Jadwal Ujian</span>
						</a>
					</li>
					<!-- Menu Nilai -->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-table text-aqua"></i> 
							<span>Nilai</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<?php foreach($perkelas as $pk){ ?>
								<li class="treeview">
									<a href="#"><i class="fa fa-circle-o"></i> Kelas <?=$pk->kelas;?>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
									<?php $where = array('kelas' => $pk->kelas); 
									$perkelasjurusan = $this->m_admin->perkelasjurusan($where)->result();
									foreach($perkelasjurusan as $pkj){ ?>
										<li>
											<a href="<?= base_url('nilai/'.$pkj->id_kelas);?>">
												<i class="fa fa-circle-o"></i> <?=$pkj->kode_kelas;?>
											</a>
										</li>
										<?php } ?>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</li> 
					<!-- End Menu Nilai -->
					<li class="header text-aqua">LAPORAN</li>
					<li class="treeview <?= $this->uri->segment(1) == 'laporan-guru' ? 'active' : '' || $this->uri->segment(1) == 'laporan-siswa' ? 'active' : '' || $this->uri->segment(1) == 'laporan-ujian' ? 'active' : '' || $this->uri->segment(1) == 'laporan-bank-soal-sekolah' ? 'active' : '' || $this->uri->segment(1) == 'laporan-nilai-raport-siswa' ? 'active' : '' || $this->uri->segment(1) == 'laporan-nilai-siswa-kelas' ? 'active' : '' || $this->uri->segment(1) == 'laporan-nilai-siswa' ? 'active' : '' || $this->uri->segment(1) == 'grafik' ? 'active' : '' ?>">
						<a href="#"><i class="fa fa-file text-aqua"></i> 
							<span>Laporan</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="<?= $this->uri->segment(1) == 'laporan-guru' ? 'active' : '' ?>">
								<a href="<?= base_url('laporan-guru') ?>">
									<i class="fa fa-circle-o"></i> 
								Laporan Guru
								</a>
							</li>
				            <li class="<?= $this->uri->segment(1) == 'laporan-siswa' ? 'active' : '' ?>">
				             	<a href="<?= base_url('laporan-siswa') ?>">
				                	<i class="fa fa-circle-o"></i>
				                	Laporan Siswa
				              	</a>
				            </li>         
				            <li class="<?= $this->uri->segment(1) == 'laporan-ujian' ? 'active' : '' ?>">
		            	  		<a href="<?= base_url('laporan-ujian') ?>">
				                	<i class="fa fa-circle-o"></i>
				                	Laporan Jadwal Ujian
				              	</a>
				            </li>
				            <li class="<?= $this->uri->segment(1) == 'laporan-bank-soal-sekolah' ? 'active' : '' ?>">
				            	<a href="<?= base_url('laporan-bank-soal-sekolah') ?>">
				                	<i class="fa fa-circle-o"></i>
				                	Laporan Bank Soal Sekolah
				              	</a>
				            </li>
				            <li class="<?= $this->uri->segment(1) == 'laporan-nilai-siswa' ? 'active' : '' ?>">
				            	<a href="<?= base_url('laporan-nilai-siswa') ?>">
				                	<i class="fa fa-circle-o"></i>
				                	Laporan Nilai PerSiswa
				              	</a>
				            </li>
				            <li class="<?= $this->uri->segment(1) == 'laporan-nilai-siswa-kelas' ? 'active' : '' ?>">
				            	<a href="<?= base_url('laporan-nilai-siswa-kelas') ?>">
				                	<i class="fa fa-circle-o"></i>
				                	Laporan Nilai Siswa PerKelas
				              	</a>
				            </li>
				            <li class="<?= $this->uri->segment(1) == 'laporan-nilai-raport-siswa' ? 'active' : '' ?>">
				            	<a href="<?= base_url('laporan-nilai-raport-siswa') ?>">
				                	<i class="fa fa-circle-o"></i>
				                	Laporan Nilai Raport Siswa
				              	</a>
				            </li>
				            <li class="<?= $this->uri->segment(1) == 'grafik' ? 'active' : '' ?>">
				            	<a href="<?= base_url('grafik') ?>">
				                	<i class="fa fa-circle-o"></i>
				                	Laporan Grafik Nilai Siswa Perkelas
				              	</a>
				            </li>                                    				                                                
				        </ul>
				    </li>
				<?php } ?>
				<?php 
				// Menu navigasi guru
				if($this->session->status == 'guru'){ ?>
					<li class="header text-aqua">MASTER SOAL</li>
					<li class="treeview <?=$this->uri->segment(1) == 'tsoal' ? 'active' : ''?>">
						<a href="#"><i class="fa fa-cube text-aqua"></i> 
							<span>Data Soal</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="<?= $this->uri->segment(1) == 'tsoal' ? 'active' : '' ?>">
								<a href="<?= base_url('tsoal') ?>">
									<i class="fa fa-circle-o"></i>
								Buat Soal
								</a>
							</li>
						</ul>
					</li>
					<!-- Menu Soal -->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-list text-aqua"></i> 
							<span>Soal</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							<?php foreach($perkelas_g as $pk){ ?>
								<li class="treeview">
									<a href="#"><i class="fa fa-circle-o"></i> Kelas <?=$pk->kelas;?> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
									<ul class="treeview-menu">
										<?php
										//$where = array('kelas' => $pk->kelas, 'id_guru' => $this->session->id); 
										$perkelasjurusan = $this->m_admin->perkelasjurusan_g($pk->kelas, $this->session->id)->result();
										foreach($perkelasjurusan as $pkj){ ?>
											<li><a href="<?=base_url('soal/'.$pkj->id_kelas);?>"><?=$pkj->kode_kelas;?></a></li>
											<?php } ?>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</li> 
					<!-- End Menu Soal -->
					<!-- Menu Nilai -->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-table text-aqua"></i> <span>Nilai</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							<?php foreach($perkelas_g as $pk){ ?>
								<li class="treeview">
									<a href="#"><i class="fa fa-circle-o"></i> Kelas <?=$pk->kelas;?> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
									<ul class="treeview-menu">
										<?php
										//$where = array('kelas' => $pk->kelas, 'id_guru' => $this->session->id); 
										$perkelasjurusan = $this->m_admin->perkelasjurusan_g($pk->kelas, $this->session->id)->result();
										foreach($perkelasjurusan as $pkj){ ?>
											<li><a href="<?= base_url('nilai/'.$pkj->id_kelas);?>"><i class="fa fa-circle-o"></i> <?=$pkj->kode_kelas;?></a></li>
											<?php } ?>
									</ul>
								</li>
            				<?php } ?>
            			</ul>
            		</li> <!-- End Menu Nilai -->
            		<li class="header text-aqua">LAPORAN</li>
            		<li class="treeview <?= $this->uri->segment(1) == 'laporan-bank-soal-guru' ? 'active' : '' || $this->uri->segment(1) == 'laporan-nilai-siswa-kelas-guru' ? 'active' : ''  ?>">
            			<a href="#"><i class="fa fa-file text-aqua"></i> <span>Laporan</span>
            				<span class="pull-right-container">
            					<i class="fa fa-angle-left pull-right"></i>
            				</span>
            			</a>
            			<ul class="treeview-menu">
            				<li class="<?= $this->uri->segment(1) == 'laporan-bank-soal-guru' ? 'active' : '' ?>">
            					<a href="<?= base_url('laporan-bank-soal-guru') ?>">
            						<i class="fa fa-circle-o"></i>
            						Laporan Bank Soal Guru
            					</a>
            				</li>
            				<li class="<?= $this->uri->segment(1) == 'laporan-nilai-siswa-kelas-guru' ? 'active' : '' ?>">
            					<a href="<?= base_url('laporan-nilai-siswa-kelas-guru') ?>">
            						<i class="fa fa-circle-o"></i>
            						Laporan Nilai Siswa PerMapel <br>&nbsp &nbsp &nbsp &nbsp (Guru)
            					</a>
            				</li>
            			</ul>
        			</li>
        			<?php } ?>
        		</ul>
        	</section>
        	 <!-- /.sidebar -->
        	</aside>