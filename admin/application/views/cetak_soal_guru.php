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
    <title>Laporan Bank Soal Guru</title>
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
                <img src="<?= base_url('../assets/img/smp.png'); ?>" style="width: 100px;">
            </td>        </tr>
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
      <h5 class="text-center m-b-30"><b>LAPORAN DATA BANK SOAL GURU</b></h5>
      <br>
    </div>
  </div>
</div>
<table class="table table-sm">
    <thead style="background-color: grey;">
        <tr>
            <th class="text-center" style="width: 1px;">No</th>
            <th class="text-center" style="width: 100px">Mata Pelajaran</th>
            <th class="text-center" style="width: 50px">Kelas</th>
            <th class="text-center" style="width: 100px">Kategori Soal</th>
            <th class="text-center" style="width: 100px">Nama Soal</th>
            <th class="text-center">Soal</th>
            <th class="text-center" style="width: 200px;">Pilihan Jawaban</th>
            <th class="text-center">Tanggal dibuat</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; $i = 0; ?>
    <?php $total = sizeof($listsoal); ?>
    <?php foreach($listsoal as $ls) : ?>
        <?php if($i == 0) : ?>
        <h6 class="text-left m-b-30"><b>Pengajar : <?= $ls->nama; ?></b></h6>
        <h6 class="text-left m-b-30"><b>Jumlah Soal : <?= $total; ?></b></h6>
        <?php $i++; ?>
        <?php endif; ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?=$ls->nama_mapel;?></td>
            <td><?=$ls->kode_kelas;?></td>
            <td><?=$ls->kategori;?></td>
            <td><?=$ls->nama_soal;?></td>
            <td><?=$ls->soal;?></td>
            <td><?= 'A. '.$ls->opsi_a.'<br>'.'B. '.$ls->opsi_b.'<br>'.'C. '.$ls->opsi_c.'<br>'.'D. '.$ls->opsi_d.'<br>'.'Kunci Jawaban : '.$ls->jawaban ?></td>
            <td><?= created_at($ls->created_at) ?></td>
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
        <p class="text-center">Pengajar</p><br><br><br>
        <p class="mb-1"><u><b><?=$this->session->nama;?></b></u></p>
        <p><b>NIP : <?=$this->session->nip;?></b></p>    </div>
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