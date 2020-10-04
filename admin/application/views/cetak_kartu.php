<!DOCTYPE html>
<html>

<head>
    <title>Kartu Ujian Peserta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .kartu-peserta-seleksi {
            padding: 16px;
            width: 415px;
            border: 1px solid black;
        }

        .kartu-peserta-seleksi p {
            font-size: 8pt;
        }

        .kartu-peserta-seleksi td,
        .kartu-peserta-seleksi .footer-wrapper p {
            font-size: 9.5pt;
        }

        .kartu-peserta-seleksi .head-wrapper {
            display: flex;
            padding: 8pt;
            flex-direction: row;
            margin: -16px -16px 0;
            align-items: center;
            justify-content: center;
            border-bottom: 2px solid black;
        }

        .kartu-peserta-seleksi .head-wrapper .sec {
            width: 60px;
            text-align: center;
        }

        .kartu-peserta-seleksi .head-wrapper .sec:nth-child(2) {
            flex: 1;
        }

        .kartu-peserta-seleksi .head-wrapper img {
            height: 50px;
        }

        .kartu-peserta-seleksi .head-wrapper .sec:last-child {
            font-weight: 900;
        }

        .kartu-peserta-seleksi .head-wrapper .sec:nth-child(-1n+3) p {
            margin-bottom: 0;
        }

        .kartu-peserta-seleksi .head-wrapper .sec:nth-child(2) p:nth-child(-n+3) {
            font-weight: bold
        }

        .kartu-peserta-seleksi .head-wrapper-footer {
            display: flex;
            padding: 8pt;
            flex-direction: row;
            margin: -16px -10px 0;
            align-items: center;
            justify-content: right;
        }

        .kartu-peserta-seleksi .head-wrapper-footer .sec {
            width: 60px;
            text-align: right;
        }

        .kartu-peserta-seleksi .head-wrapper-footer .sec:nth-child(2) {
            flex: 1;
        }

        .kartu-peserta-seleksi .head-wrapper-footer img {
            height: 100px;
        }

        .kartu-peserta-seleksi .head-wrapper-footer .sec:last-child {
            font-weight: 900;
        }

        .kartu-peserta-seleksi .head-wrapper-footer .sec:nth-child(-1n+3) p {
            margin-bottom: 0;
        }

        .kartu-peserta-seleksi .head-wrapper-footer .sec:nth-child(2) p:nth-child(-n+3) {
            font-weight: bold
        }        

        .kartu-peserta-seleksi .content-wrapper {
            padding: 16px 0;
        }


        .kartu-peserta-seleksi .content-wrapper tr:nth-last-child(-n+2) td:last-child {
            color: black;
        }

        .kartu-peserta-seleksi .content-wrapper tr td:nth-child(2) {
            width: 15px;
            text-align: center;
        }

        .kartu-peserta-seleksi .footer-wrapper {
            text-align: right;
        }

        .kartu-peserta-seleksi .footer-wrapper p {
            margin-bottom: 0
        }
    </style>
</head>

<body>
    <div class="kartu-peserta-seleksi-wrapper">
        <div class="kartu-peserta-seleksi">
            <div class="head-wrapper">
                <div class="sec"><img src="<?= base_url('../assets/img/amuntai.png');?>" alt="SMPN 5 AMUNTAI"></div>
                <div class="sec">
                    <p>PEMERINTAH KABUPATEN HULU SUNGAI UTARA</p>
                    <p>DINAS PENDIDIKAN DAN KEBUDAYAAN</p>
                    <p>SMP NEGERI 5 AMUNTAI</p>
                    <p>Jl. Jermani Husin Km. 7 Rt. 1 No. 53 Kec. Banjang Kab. Hulu Sungai Utara, 71416 </p>
                </div>
                <div class="sec"><img src="<?= base_url('../assets/img/smp.png');?>" alt="SMPN 5 AMUNTAI"></div>
                </div>
            <div class="content-wrapper">
                <table>
                    <tbody>
                        <?php foreach($siswa as $s) : ?>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td><strong><?= $s->nis ?></strong></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><strong><?= $s->nama ?></strong></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><strong><?= $s->kode_kelas ?></strong></td>
                        </tr>                        
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><strong><?= $s->jenis_kelamin ?></strong></td>
                        </tr>                        
                        <tr>
                            <td>TTL</td>
                            <td>:</td>
                            <td><strong><?= $s->tmpt_lahir. ', '.format_hari_tanggal($s->tgl_lahir) ?></strong></td>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td>:</td>
                            <td><strong><?= $s->tahun_ajaran ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="head-wrapper-footer">
                <div class="sec"><img src="<?= base_url('./../upload/foto/'.$s->foto);?>"></div>
                <?php endforeach; ?>
                <div class="sec">
                <?php $tanggal = date('Y-m-d'); ?>
                <p>Amuntai, <?= format_hari_tanggal($tanggal); ?></p>
                <p>Kepala Sekolah</p>
                <br><br>
                <?php foreach($kepala_sekolah as $kpl) : ?>
                <p><strong><?= $kpl->nama ?></strong></p>
                <p><strong>NIP :<?= $kpl->nip ?></strong></p>
                <?php endforeach;?>
                </div>
            </div>            
        </div>
    </div>
</body>

<script type="text/javascript">
    window.print()
</script>
</html>
