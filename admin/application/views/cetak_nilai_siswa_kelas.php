<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <style>
            table.table{
                border:1px solid black;
            }
            table.table > thead > tr > th{
                border:1px solid black;
            }
            table.table > tbody > tr > td{
                border:1px solid black;
            }
            @page { size: portrait; }
    </style>    
    <title>Laporan Nilai Siswa PerKelas</title>
</head>
<body>
<center>
    <table>
        <tr>
            <td>
                <img src="<?= base_url('../assets/img/amuntai.png'); ?>" style="width: 100px;">
            </td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>
                <center>
                    <h5>PEMERINTAH KABUPATEN HULU SUNGAI UTARA</h5>
                    <h5>DINAS PENDIDIKAN DAN KEBUDAYAAN</h5>
                    <h4>SMP NEGERI 5 AMUNTAI</h4>
                    <p>Jl. Jermani Husin Km.7 No 53 Kec. Banjang Kab. Hulu Sungai Utara, 71416</p>
                </center>
            </td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>
                <img src="<?= base_url('../assets/img/smp.png'); ?>" style="width: 120px;">
            </td>        
        </tr>
    </table>
</center>
<hr width="100%" class="mb-2" style="border: 0; height: 0; border-top: 2px solid black; border-bottom: 2px solid black;">
<br>

<?php $tanggal = date('Y-m-d') ?>
<div class="row">
    <div class="col-12 text-right">
        <p class="mb-2">Tanggal Cetak : <?= format_hari_tanggal($tanggal) ?></p>
            <?php if($this->session->status == 'admin') : ?>
                <p>Admin : <?=ucfirst($this->session->nama);?></p>
            <?php elseif($this->session->status == 'guru') : ?>
                <p>User : <?=ucfirst($this->session->nama);?></p>
            <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="invoice-title">
      <h5 class="text-center m-b-30"><b>LAPORAN NILAI SISWA PERKELAS</b></h5>
      <br>
    </div>
  </div>
</div>
<table class="table table-sm">
    <thead style="background-color: grey;" class="text-center">
        <tr>
            <th style="width: 1px;">No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; $i = 0;?>
    <?php foreach($cetak_nilai_siswa as $nilai) : ?>
        <?php if($i == 0) : ?>   
        <div class="row">
            <div class="col-5 text-right">
                <p class="text-left mb-1">Mata Pelajaran : <?= $nilai->mapel; ?></p>
            </div>

            <div class="col-5 text-right">
                <p class="text-left mb-1">Pengajar : <?= $nilai->nama_guru; ?></p>
            </div>

            <div class="col-2 text-right">
                <p class="text-left mb-1">Kelas : <?= $nilai->kode_kelas; ?></p>
            </div>

            <div class="col-5 text-right">
                <p class="text-left mb-1">Jenis Ujian : <?= $nilai->nama_ujian; ?></p>
            </div>

            <div class="col-5 text-right">
                <p class="text-left mb-1">Tanggal : <?= format_hari_tanggal($nilai->tanggal_mulai); ?></p>
            </div>    

            <div class="col-2 text-right">
                <p class="text-left mb-1">Jam : <?= jam($nilai->tanggal_mulai).'-'.jam($nilai->tanggal_selesai); ?></p>
            </div>    
        </div>
        <?php $i++; ?>
        <?php endif; ?>        
        <tr>
            <td><?= $no++; ?></td>
            <td><?=$nilai->nis;?></td>
            <td><?=$nilai->nama;?></td>
            <td><?=$nilai->nilai;?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="float-right">
        <?php $tanggal = date('Y-m-d'); ?>
        <p class="text-center mb-1">Amuntai, <?= format_hari_tanggal($tanggal) ?></p>
        <?php if($this->session->jabatan ==  'Administrator') :?>
            <p class="text-center">Kepala Tata Usaha</p><br><br><br>
        <?php elseif($this->session->jabatan ==  'Kepala Sekolah') :?>
            <p class="text-center">Kepala Sekolah</p><br><br><br>
        <?php endif; ?>
        <p class="mb-1"><u><b><?=$this->session->nama;?></b></u></p>
        <p><b>NIP : <?=$this->session->nip;?></b></p>
    </div>
  </div>
</div>
<script>
    window.print();
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>