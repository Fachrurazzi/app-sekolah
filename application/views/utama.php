		<div class="row">
			
			<?php
			if ($ar['password'] == $this->session->nis || empty($ar['pertanyaan']) && empty($ar['jawaban'])): ?>
			<div class="col-sm-12">
				<div class="alert alert-danger">
					<h4><i class="icon fa fa-warning"></i> Selamat Datang</h4>
					<ul>
						<li><h5>Ubah password default anda dengan yang baru !</h5></li>
						<li><h5>Atur pertanyaan dan jawaban untuk mereset password !</h5></li>
						<li><h5>Silahkan <a href="<?=base_url('setting');?>">klik disini !</a></h5></li>
					</ul>
				</div>
			</div>
			<?php else: ?>

			<div class="col-sm-3">
				<div class="alert bg-green">
					<h4>Kelas <i class="pull-right fa fa-building-o"></i></h4>
					<span class="d-block"><?=$this->session->kelas;?></span>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="alert bg-blue">
					<h4>NIS <i class="pull-right fa fa-graduation-cap"></i></h4>
					<span class="d-block"><?=$this->session->nis;?></span>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="alert bg-yellow">
					<h4>Tanggal <i class="pull-right fa fa-calendar"></i></h4>
					<span class="d-block"><?=strftime('%A, %d %B %Y')?></span>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="alert bg-red">
					<h4>Jam <i class="pull-right fa fa-clock-o"></i></h4>
					<span class="d-block"> <span class="live-clock"><?=date('H:i:s')?></span></span>
				</div>
			</div>			

			<div class="col-sm-12">
		      <div class="box box-solid">
		        <div class="box-header with-border">
		          <h4 class="box-title">VISI</h4>
		        </div>
		        <!-- /.box-header -->
		        <div class="box-body">
		          <p>Berprestasi, Berkarakter dan Peduli Lingkungan.</p>
		        </div>
		        <!-- /.box-body -->
		      </div>
		      <!-- /.box -->
		      <div class="box box-solid">
		        <div class="box-header with-border">
		          <h4 class="box-title">MISI</h4>
		        </div>
		        <!-- /.box-header -->
		        <div class="box-body">
		          <p>1. Menenumbuhkan semangat berprestasi terhadap seluruh angggota/warga sekolah. <br>
		            2. Membantu siswa untuk mengenal potensi dirinya sehingga dapat berkembang secara optimal. <br>
		            3. Mendorong siswa dalam menginternalisasikan ajaran agama sehingga berakhlak mulia. <br>
		            4. Mendorong lulusan yang berkualitas dan berkarakter positif. <br>
		          5. Menumbuhkan kesadaran dan peduli terhadap lingkungan alam sekitar.</p>
		        </div>
		        <!-- /.box-body -->
		      </div>		          
			</div>

			<div class="col-sm-12">
				<div class="box box-solid">
					<div class="box-header bg-blue">
						<h3 class="box-title">Jadwal Ujian</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<?php if(count($jdwlujian) > 0) { ?>
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th class="text-center">Nama Ujian</th>
									<th class="text-center">Mata Pelajaran</th>
									<th class="text-center">Jumlah Soal</th>
									<th class="text-center">Tanggal</th>
									<th class="text-center">Waktu</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1; 
								foreach($jdwlujian as $ju){ 
									if ($ju->sudah_ikut < 1) { ?>
								<tr>
									<td><?=$no++;?>.</td>
									<td><?=$ju->nama_ujian;?></td>
									<td><?=$ju->mapel;?></td>
									<td><?=$ju->jumlah_soal;?></td>
									<td><?=periode($ju->tanggal_mulai). ' || '.date('H:i', strtotime($ju->tanggal_selesai));?></td>
									<td><?=$ju->waktu;?> Menit</td>
									<?php date_default_timezone_set('Asia/singapore'); ?>
									<?php $now = strtotime(date('Y-m-d H:i:s')) ?>
									<?php $mulai = strtotime($ju->tanggal_mulai) ?>
									<?php $selesai = strtotime($ju->tanggal_selesai) ?>
									<?php if($now >= $mulai && $now <= $selesai) : ?>
										<td><button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modalUjian<?=$ju->id_ujian;?>"><i class="fa fa-send"></i> Ikuti Ujian</button></td>
									<?php elseif($now <= $mulai) : ?>
										<td><button class="btn btn-xs btn-success disabled"><i class="fa fa-spin fa-spinner"></i> Belum Mulai</button></td>
									<?php else : ?>
										<td><button class="btn btn-xs btn-warning disabled"><i class="fa fa-spin fa-check"></i> Sesi Telah Berakhir</button></td>
									<?php endif; ?>
								</tr>
								<!-- Modal ujian -->
								<div class="modal fade" id="modalUjian<?=$ju->id_ujian;?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title"><?=$ju->mapel;?></h4>
											</div>
											<div class="modal-body">
												<h4>Anda akan mengerjakan <?=$ju->nama_ujian;?> <?=$ju->mapel;?></h4>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
												<a href="<?=base_url($ju->id_ujian);?>" class="btn btn-success">Mulai Mengerjakan</a>
											</div>
										</div>
									</div>
								</div>
								<?php }									
								} ?>
							</tbody>
						</table>
						<?php }
							  else{ ?>
						<div>
							<h1 class="text-center text-red"><i class="fa fa-warning"></i></h1>
							<h4 class="text-center">Tidak Ada Ujian !</h4>
						</div>
							<?php } ?>
					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="box box-solid">
					<div class="box-header bg-red">
						<h4 class="box-title">Riwayat Ujian</h4>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<?php if(count($jdwlujian) > 0) { ?>
						<table id="TableRiwayat" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th class="text-center">Nama Ujian</th>
									<th class="text-center">Mata Pelajaran</th>
									<th class="text-center">Jumlah Soal</th>
									<th class="text-center">Tanggal</th>
									<th class="text-center">Waktu</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1; 
								foreach($jdwlujian as $ju){ 
								if ($ju->sudah_ikut > 0) { ?>
								<tr>
									<td><?=$no++;?>.</td>
									<td><?=$ju->nama_ujian;?></td>
									<td><?=$ju->mapel;?></td>
									<td><?=$ju->jumlah_soal;?></td>
									<td><?=periode($ju->tanggal_mulai). ' || '.date('H:i', strtotime($ju->tanggal_selesai));?></td>									
									<td><?=$ju->waktu;?> Menit</td>
								<?php if ($ju->status == 'Y') { ?>
									<td><a href="<?=base_url($ju->id_ujian);?>" class="btn btn-xs btn-success"><i class="fa fa-spin fa-spinner"></i> Sedang Ujian</a></td>
								<?php }
									if ($ju->status == 'N') { ?>
									<td><a href="<?=base_url($ju->id_ujian);?>" class="btn btn-xs btn-danger"><i class="fa fa-check"></i> Sudah Ujian</a></td>
								<?php } ?>
								</tr>
								<?php 
									}
								} ?>
							</tbody>
						</table>
						<?php }
							  else{ ?>
						<div>
							<h1 class="text-center text-red"><i class="fa fa-warning"></i></h1>
							<h4 class="text-center">Tidak Ada Ujian !</h4>
						</div>
							<?php } ?>
					</div>
				</div>
			</div>

		<?php endif;?>

		</div>

	<script>
	$('#TableRiwayat').DataTable({
      'paging' : true,
      'lengthChange' : true,
      'searching' : true,
      'ordering' : false,
      'info' : true,
      'autoWidth' : false        
    });
	</script>