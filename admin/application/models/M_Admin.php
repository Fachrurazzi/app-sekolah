<?php

class M_Admin extends CI_Model{
    
    function __construct()
    {
        parent::__construct();

    }

    //Login
    function login_admin($where){
        return $this->db->get_where('admin', $where);
    }

    function login_guru($where){
        //return $this->db->get_where('guru', $where);
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('mapel', 'guru.mapel=mapel.id_mapel');
        $this->db->where($where);
        return $this->db->get();
    }

    //Cek password admin
    function cek_passwd_admin($where){
        $this->db->select('password');
        return $this->db->get_where('admin', $where);
    }

    //Cek Password Default Guru
    function cek_passwd_guru($where){
        $this->db->select('guru.username, guru.password');
        return $this->db->get_where('guru', $where);
    }

    //Ganti Password Guru
    function update_passwd($table, $data, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Halaman Utama

    //Guru
    function list_guru(){
        //return $this->db->get('guru');
        $this->db->select('guru.*, mapel.*');
        $this->db->from('guru');
        $this->db->join('mapel', 'mapel.id_mapel=guru.mapel');
        $this->db->order_by('mapel.mapel', 'asc');
        $query = $this->db->get();
        return $query;
    }

    function cetak_guru($mapel){
        $query = "select guru.*, mapel.* from guru join mapel on guru.mapel = mapel.id_mapel where mapel.id_mapel = '$mapel'";

        return $this->db->query($query);
    }    

    function insert_guru($table, $data){
        $this->db->insert($table, $data);
    }

    function update_guru($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_guru($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //buku
    function list_buku(){
        //return $this->db->get('guru');
        $this->db->select('buku.*');
        $this->db->from('buku');
        $query = $this->db->get();
        return $query;
    }
    
    function insert_buku($table, $data){
        $this->db->insert($table, $data);
    }

    function update_buku($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_buku($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //motor
    function list_motor(){
        //return $this->db->get('guru');
        $this->db->select('motor.*');
        $this->db->from('motor');
        $query = $this->db->get();
        return $query;
    }
    
    function insert_motor($table, $data){
        $this->db->insert($table, $data);
    }

    function update_motor($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_motor($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Mapel
    function list_mapel(){
        $this->db->order_by('mapel');
        return $this->db->get('mapel');
    }

    public function get_all_mapel()
    {
        return $this->db->query('select * from mapel order by mapel asc')->result_array();
    }

    function insert_mapel($table, $data){
        $this->db->insert($table, $data);
    }
    function update_mapel($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_mapel($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Kategori
    function list_kategori(){
        return $this->db->get('kategori');
    }

    function insert_kategori($table, $data){
        $this->db->insert($table, $data);
    }

    function update_kategori($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_kategori($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }


    //Siswa
    function list_siswa(){
        return $this->db->query('select siswa.*, kelas.kode_kelas from siswa join kelas on siswa.kelas=kelas.id_kelas order by kelas.kode_kelas');
    }

    function list_siswa_perkelas($kelas){
        return $this->db->query('select siswa.*, kelas.kode_kelas from siswa join kelas on siswa.kelas=kelas.id_kelas where kelas.id_kelas = '.$kelas.'');
    }

    function kartu_peserta($id){
        return $this->db->query('select siswa.*, kelas.kode_kelas from siswa join kelas on siswa.kelas = kelas.id_kelas where id_siswa = ?', $id);
    } 

    function insert_siswa($table, $data){
        $this->db->insert($table, $data);
    }

    function cetak_siswa_kelas($kelas){
        $query = "select siswa.*, kelas.kode_kelas as kode_kelas from siswa join kelas on siswa.kelas = kelas.id_kelas where kelas.id_kelas = '$kelas' order by nama";

        return $this->db->query($query);
    }

    function cetak_siswa_tahun($tahun) {
        $query = "select siswa.*, kelas.kode_kelas as kode_kelas from siswa join kelas on siswa.kelas = kelas.id_kelas where tahun_ajaran = '$tahun' order by nama";

        return $this->db->query($query);
    }

    function cetak_siswa_kelas_tahun($kelas, $tahun) {
        $query = "select siswa.*, kelas.kode_kelas as kode_kelas from siswa join kelas on siswa.kelas = kelas.id_kelas where kelas.id_kelas = '$kelas' and tahun_ajaran = '$tahun' order by nama";
        
        return $this->db->query($query);
    }    

    function update_siswa($table, $data, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_siswa($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Kelas
    function list_kelas(){
        //return $this->db->get('kelas');
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('guru', 'guru.id_guru=kelas.id_guru');
        $this->db->order_by('kode_kelas');
        $query = $this->db->get();
        return $query;
    }

    function insert_kelas($table, $data){
        $this->db->insert($table, $data);
    }

    function update_kelas($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_kelas($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function pilih_kelas($where){
        $this->db->where($where);
        return $this->db->get('kelas');
    }

    //Jurusan
    function list_jurusan(){
        return $this->db->get('jurusan');
    }
    function insert_jurusan($table, $data){
        $this->db->insert($table, $data);
    }
    function update_jurusan($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_jurusan($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }    

    // tampil hanya kelas
    function perkelas(){
        return $this->db->query('SELECT kelas FROM kelas GROUP BY kelas');
    }

    // tampil perkelas jurusan
    function perkelasjurusan($where){
        $this->db->select('id_kelas, kode_kelas');
        $this->db->from('kelas');
        $this->db->where($where);
        $this->db->order_by('kode_kelas', 'ASC');
        return $this->db->get();
    }    

    // tampil perkelas  guru
    function perkelas_g($id){
        return $this->db->query('select kelas.* from soal join guru ON guru.id_guru = soal.guru 
join kelas ON kelas.id_kelas = soal.kelas
 where guru.id_guru='.$id.' group by kelas');
    }

    // tampil perkelas jurusan - guru
    function perkelasjurusan_g($kelas, $idguru){
        return $this->db->query('select kelas.* from soal, guru, kelas where guru.id_guru='.$idguru.' and kelas.kelas='.$kelas.' and soal.guru=guru.id_guru and soal.kelas=kelas.id_kelas group by kode_kelas');
    }    
   
    //Soal
    //Tampil Soal Admin
    function soal_admin($pjk, $mapel, $kategori){
        
        $query = 'select soal.*, kelas.id_kelas, kelas.kode_kelas, guru.id_guru, guru.nama, guru.mapel, kategori.id_kategori, kategori.kategori from soal join kelas on kelas.id_kelas = soal.kelas join guru on guru.id_guru = soal.guru join kategori on kategori.id_kategori = soal.id_kategori where soal.kelas='.$pjk.' and soal.kelas=kelas.id_kelas and soal.guru=guru.id_guru';
        if($mapel != null){
            $query .= ' and soal.mapel='.$mapel;
        }
        if($kategori != null){
            $query .= ' and soal.id_kategori= '.$kategori;
        }
        return $this->db->query($query);

    }

    //Tampil Soal Guru
    function soal_guru($idguru, $pkj, $kategori){
        //return $this->db->get_where('soal, guru, kelas', $where);
        $query = 'select soal.*, guru.nama, kategori.kategori 
                  from soal
                  join guru on guru.id_guru = soal.guru 
                  join kelas on kelas.id_kelas = soal.kelas
                  join kategori on kategori.id_kategori = soal.id_kategori
                  where guru.id_guru='.$idguru.' and kelas.id_kelas='.$pkj.' and soal.guru=guru.id_guru and soal.kelas=kelas.id_kelas';

        if($kategori != null) {
            $query .= ' and soal.id_kategori = '.$kategori;
        }
        return $this->db->query($query);
    }

    //Tambah soal tanpa media
    function in_soal_nomedia($table, $data){
        $this->db->insert($table, $data);
    }

    //Tambah soal dengan media
    function in_soal_media($table, $data){
        $this->db->insert($table, $data);
    }

    //Update soal tanpa media
    function up_soal_nomedia($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Update soal dengan media
    function up_soal_media($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //get soal by id
    function get_soal_by_id($where){
        $this->db->join('kelas', 'soal.kelas=kelas.id_kelas');
        $this->db->join('guru', 'soal.guru=guru.id_guru');
        $this->db->join('mapel', 'soal.mapel=mapel.id_mapel');
        $this->db->join('kategori', 'soal.id_kategori=kategori.id_kategori');
        return $this->db->get_where('soal', $where);
    }

    function cetak_soal_kelas($kelas){
        $query = '
                  select soal.*, 
                        kelas.id_kelas, kelas.kode_kelas, guru.id_guru, guru.nama, guru.mapel, 
                        kategori.id_kategori, kategori.kategori, mapel.mapel as nama_mapel 
                  from soal
                  join kelas on kelas.id_kelas = soal.kelas
                  join guru on guru.id_guru = soal.guru 
                  join kategori on kategori.id_kategori = soal.id_kategori 
                  join mapel on mapel.id_mapel = soal.mapel
                  where soal.kelas='.$kelas.'';

        return $this->db->query($query);        
    }

    function cetak_soal_mapel($mapel){
        $query = '
                  select soal.*, 
                        kelas.id_kelas, kelas.kode_kelas, guru.id_guru, guru.nama, guru.mapel, 
                        kategori.id_kategori, kategori.kategori, mapel.mapel as nama_mapel 
                  from soal
                  join kelas on kelas.id_kelas = soal.kelas
                  join guru on guru.id_guru = soal.guru 
                  join kategori on kategori.id_kategori = soal.id_kategori 
                  join mapel on mapel.id_mapel = soal.mapel
                  where soal.mapel='.$mapel.'';

        return $this->db->query($query);        
    }

    function cetak_soal_kategori($kategori){
        $query = '
                  select soal.*, 
                        kelas.id_kelas, kelas.kode_kelas, guru.id_guru, guru.nama, guru.mapel, 
                        kategori.id_kategori, kategori.kategori, mapel.mapel as nama_mapel 
                  from soal
                  join kelas on kelas.id_kelas = soal.kelas
                  join guru on guru.id_guru = soal.guru 
                  join kategori on kategori.id_kategori = soal.id_kategori 
                  join mapel on mapel.id_mapel = soal.mapel
                  where soal.id_kategori='.$kategori.'';

        return $this->db->query($query);        
    }

    function cetak_soal_kelas_mapel($kelas, $mapel){
        $query = '
                  select soal.*, 
                        kelas.id_kelas, kelas.kode_kelas, guru.id_guru, guru.nama, guru.mapel, 
                        kategori.id_kategori, kategori.kategori, mapel.mapel as nama_mapel 
                  from soal
                  join kelas on kelas.id_kelas = soal.kelas
                  join guru on guru.id_guru = soal.guru 
                  join kategori on kategori.id_kategori = soal.id_kategori 
                  join mapel on mapel.id_mapel = soal.mapel
                  where soal.kelas='.$kelas.' and soal.mapel = '.$mapel.'';

        return $this->db->query($query);        
    }

    function cetak_soal_kelas_mapel_kategori($kelas, $mapel, $kategori){
        $query = '
                  select soal.*, 
                        kelas.id_kelas, kelas.kode_kelas, guru.id_guru, guru.nama, guru.mapel, 
                        kategori.id_kategori, kategori.kategori, mapel.mapel as nama_mapel 
                  from soal
                  join kelas on kelas.id_kelas = soal.kelas
                  join guru on guru.id_guru = soal.guru 
                  join kategori on kategori.id_kategori = soal.id_kategori 
                  join mapel on mapel.id_mapel = soal.mapel
                  where soal.kelas='.$kelas.' and soal.mapel = '.$mapel.' and soal.id_kategori = '.$kategori.'';

        return $this->db->query($query);        
    }

    function cetak_soal_semua(){
        $query = '
                  select soal.*, 
                        kelas.id_kelas, kelas.kode_kelas, guru.id_guru, guru.nama, guru.mapel, 
                        kategori.id_kategori, kategori.kategori, mapel.mapel as nama_mapel 
                  from soal
                  join kelas on kelas.id_kelas = soal.kelas
                  join guru on guru.id_guru = soal.guru 
                  join kategori on kategori.id_kategori = soal.id_kategori 
                  join mapel on mapel.id_mapel = soal.mapel';

        return $this->db->query($query);        
    }                                    

    function cetak_soal_guru($idguru, $mapel, $kelas, $kategori){
        //return $this->db->get_where('soal, guru, kelas', $where);
        $query = 'select soal.*, 
                    guru.nama, kategori.kategori, mapel.mapel as nama_mapel, kelas.kode_kelas 
                  from soal
                  join guru on guru.id_guru = soal.guru 
                  join kelas on kelas.id_kelas = soal.kelas
                  join kategori on kategori.id_kategori = soal.id_kategori
                  join mapel on mapel.id_mapel = soal.mapel
                  where guru.id_guru='.$idguru.' and kelas.id_kelas='.$kelas.' and soal.guru=guru.id_guru and soal.kelas=kelas.id_kelas and soal.mapel = '.$mapel.'';

        if($kategori != null) {
            $query .= ' and soal.id_kategori = '.$kategori;
        }
        return $this->db->query($query);
    }    

    //Tampil kelas
    function vkelas($where){
        return $this->db->get_where('kelas', $where);
    }

    //Ujian
    function list_ujian(){
        $this->db->select('ujian.*, kelas.id_kelas, kelas.kode_kelas, mapel.*, guru.id_guru, guru.nama');
        $this->db->from('ujian');
        $this->db->join('kelas', 'ujian.id_kelas=kelas.id_kelas');
        $this->db->join('mapel', 'ujian.id_mapel=mapel.id_mapel');
        $this->db->join('guru', 'ujian.id_guru=guru.id_guru');
        $this->db->order_by('mapel.id_mapel');
        return $this->db->get();
    }

    //Tambah ujian
    function t_ujian($table, $data){
        $this->db->insert($table, $data);
    }

    //Edit ujian
    function e_ujian($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Cetak Jadwal
    function cetak_ujian_bulan($bulan){
        $query = "select ujian.*, 
                    kelas.id_kelas, kelas.kode_kelas, mapel.*, guru.id_guru, guru.nama 
                  from ujian join kelas on ujian.id_kelas = kelas.id_kelas
                  join mapel on ujian.id_mapel = mapel.id_mapel 
                  join guru on ujian.id_guru = guru.id_guru where date_format(tanggal_mulai, '%m') = '$bulan'";

        return $this->db->query($query);
    } 

    function cetak_ujian_tahun($tahun){
        $query = "select ujian.*, 
                    kelas.id_kelas, kelas.kode_kelas, mapel.*, guru.id_guru, guru.nama 
                  from ujian join kelas on ujian.id_kelas = kelas.id_kelas
                  join mapel on ujian.id_mapel = mapel.id_mapel 
                  join guru on ujian.id_guru = guru.id_guru where date_format(tanggal_mulai, '%Y') = '$tahun'";

        return $this->db->query($query);
    }

    function cetak_ujian_bulan_tahun($bulan, $tahun){
        $query = "select ujian.*, 
                    kelas.id_kelas, kelas.kode_kelas, mapel.*, guru.id_guru, guru.nama 
                  from ujian join kelas on ujian.id_kelas = kelas.id_kelas
                  join mapel on ujian.id_mapel = mapel.id_mapel 
                  join guru on ujian.id_guru = guru.id_guru where date_format(tanggal_mulai, '%Y-%m') = '$tahun-$bulan'";

        return $this->db->query($query);
    }         

    function cetak_nilai_raport_siswa($kelas) {
        $query = "
            SELECT siswa.nis, siswa.nama, kelas.kode_kelas, guru.nama as wali_kelas, guru.nip as nip,        
                (SELECT avg(ikut_ujian.nilai)                  
                    FROM ikut_ujian                        
                    JOIN ujian ON ikut_ujian.id_ujian = ujian.id_ujian
                    JOIN mapel ON ujian.id_mapel = mapel.id_mapel
                    WHERE mapel.id_mapel =1 AND ikut_ujian.id_siswa = siswa.id_siswa
                                                           
                ) AS nilai_matematika,
                    (SELECT avg(ikut_ujian.nilai)                  
                    FROM ikut_ujian                        
                    JOIN ujian ON ikut_ujian.id_ujian = ujian.id_ujian
                    JOIN mapel ON ujian.id_mapel = mapel.id_mapel
                    WHERE mapel.id_mapel =2 AND ikut_ujian.id_siswa = siswa.id_siswa
                                                           
                ) AS nilai_bahasa_indo,
                    (SELECT avg(ikut_ujian.nilai)                  
                    FROM ikut_ujian                        
                    JOIN ujian ON ikut_ujian.id_ujian = ujian.id_ujian
                    JOIN mapel ON ujian.id_mapel = mapel.id_mapel
                    WHERE mapel.id_mapel =3 AND ikut_ujian.id_siswa = siswa.id_siswa
                                                           
                ) AS nilai_bahasa_inggris,
                    (SELECT avg(ikut_ujian.nilai)                  
                    FROM ikut_ujian                        
                    JOIN ujian ON ikut_ujian.id_ujian = ujian.id_ujian
                    JOIN mapel ON ujian.id_mapel = mapel.id_mapel
                    WHERE mapel.id_mapel =4 AND ikut_ujian.id_siswa = siswa.id_siswa
                                                           
                ) AS nilai_ipa,
                    (SELECT avg(ikut_ujian.nilai)                  
                    FROM ikut_ujian                        
                    JOIN ujian ON ikut_ujian.id_ujian = ujian.id_ujian
                    JOIN mapel ON ujian.id_mapel = mapel.id_mapel
                    WHERE mapel.id_mapel =5 AND ikut_ujian.id_siswa = siswa.id_siswa
                                                           
                ) AS nilai_ips,
                    (SELECT avg(ikut_ujian.nilai)                  
                    FROM ikut_ujian                        
                    JOIN ujian ON ikut_ujian.id_ujian = ujian.id_ujian
                    JOIN mapel ON ujian.id_mapel = mapel.id_mapel
                    WHERE mapel.id_mapel =6 AND ikut_ujian.id_siswa = siswa.id_siswa
                                                           
                ) AS nilai_pai,
                    (SELECT avg(ikut_ujian.nilai)                  
                    FROM ikut_ujian                        
                    JOIN ujian ON ikut_ujian.id_ujian = ujian.id_ujian
                    JOIN mapel ON ujian.id_mapel = mapel.id_mapel
                    WHERE mapel.id_mapel =7 AND ikut_ujian.id_siswa = siswa.id_siswa
                                                           
                ) AS nilai_senibudaya                                                
            FROM siswa                                   
            JOIN kelas ON siswa.kelas = kelas.id_kelas   
            JOIN ujian ON kelas.id_kelas = ujian.id_kelas
            JOIN guru ON guru.id_guru = kelas.id_guru
            WHERE siswa.kelas = '$kelas' group by siswa.nis";

        return $this->db->query($query)->result();
    }

    function cetak_nilai_siswa_kelas($kelas, $mapel, $jenis) {
        $query = "
        SELECT ikut_ujian.tgl_mulai, ikut_ujian.tgl_selesai, guru.nama as nama_guru, kelas.kode_kelas, mapel.mapel, ujian.nama_ujian, ujian.tanggal_mulai, ujian.tanggal_selesai, siswa.nis, siswa.nama, ikut_ujian.nilai, ujian.waktu 
        FROM ikut_ujian
        JOIN siswa ON siswa.id_siswa = ikut_ujian.id_siswa
        JOIN ujian ON ujian.id_ujian = ikut_ujian.id_ujian
        JOIN kelas ON kelas.id_kelas = ujian.id_kelas
        JOIN mapel ON mapel.id_mapel = ujian.id_mapel
        JOIN guru ON guru.mapel = mapel.id_mapel 
        WHERE siswa.kelas = '$kelas' and ujian.id_mapel = '$mapel' AND ujian.nama_ujian = '$jenis' GROUP BY siswa.nis";
        
        return $this->db->query($query)->result();
    }

    function cetak_nilai_siswa_kelas_guru($kelas, $mapel) {
        $query = "
            SELECT s.nis, s.nama, m.mapel, s.id_siswa, g.nama as nama_pengajar, k.kode_kelas as kode_kelas,
                (SELECT ikut_ujian.nilai
                    FROM ujian 
                    JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                    JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                    WHERE siswa.id_siswa = s.id_siswa AND ujian.nama_ujian = 'Ulangan-1' AND ujian.id_mapel = '$mapel') AS ulangan_1,
                (SELECT ikut_ujian.nilai
                    FROM ujian 
                    JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                    JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                    WHERE siswa.id_siswa = s.id_siswa AND ujian.nama_ujian = 'Ulangan-2' AND ujian.id_mapel = '$mapel') AS ulangan_2,
                (SELECT ikut_ujian.nilai
                    FROM ujian 
                    JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                    JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                    WHERE siswa.id_siswa = s.id_siswa AND ujian.nama_ujian = 'Ulangan-3' AND ujian.id_mapel = '$mapel') AS ulangan_3,
                (SELECT ikut_ujian.nilai
                    FROM ujian 
                    JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                    JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                    WHERE siswa.id_siswa = s.id_siswa AND ujian.nama_ujian = 'UTS' AND ujian.id_mapel = '$mapel') AS uts,                                   
                (SELECT ikut_ujian.nilai
                    FROM ujian 
                    JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                    JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                    WHERE siswa.id_siswa = s.id_siswa AND ujian.nama_ujian = 'UAS' AND ujian.id_mapel = '$mapel') AS uas                        
            FROM siswa s
            JOIN ikut_ujian iu ON iu.id_siswa = s.id_siswa
            JOIN ujian u ON iu.id_ujian = u.id_ujian
            JOIN mapel m ON u.id_mapel = m.id_mapel
            JOIN guru g ON g.mapel = m.id_mapel
            JOIN kelas k ON u.id_kelas = k.id_kelas
            WHERE u.id_kelas = '$kelas' AND m.id_mapel = '$mapel' GROUP BY s.nis";
        
        return $this->db->query($query)->result();
    }    

    function cetak_nilai_siswa($kelas, $siswa) {
        $query = "
        SELECT s.nis, s.nama, m.mapel, s.id_siswa, k.kode_kelas, s.tahun_ajaran,
            (SELECT ikut_ujian.nilai
                FROM ujian 
                JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                WHERE siswa.id_siswa = '$siswa' AND ujian.nama_ujian = 'Ulangan-1' AND ujian.id_mapel = m.id_mapel) AS ulangan_1,
            (SELECT ikut_ujian.nilai
                FROM ujian 
                JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                WHERE siswa.id_siswa = '$siswa' AND ujian.nama_ujian = 'Ulangan-2' AND ujian.id_mapel = m.id_mapel) AS ulangan_2,
            (SELECT ikut_ujian.nilai
                FROM ujian 
                JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                WHERE siswa.id_siswa = '$siswa' AND ujian.nama_ujian = 'Ulangan-3' AND ujian.id_mapel = m.id_mapel) AS ulangan_3,
            (SELECT ikut_ujian.nilai
                FROM ujian 
                JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                WHERE siswa.id_siswa = '$siswa' AND ujian.nama_ujian = 'UTS' AND ujian.id_mapel = m.id_mapel) AS uts,
            (SELECT ikut_ujian.nilai
                FROM ujian 
                JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                WHERE siswa.id_siswa = '$siswa' AND ujian.nama_ujian = 'UAS' AND ujian.id_mapel = m.id_mapel) AS uas                                                                
        FROM siswa s
        JOIN ikut_ujian iu ON iu.id_siswa = s.id_siswa
        JOIN ujian u ON iu.id_ujian = u.id_ujian
        JOIN mapel m ON u.id_mapel = m.id_mapel
        JOIN kelas k ON s.kelas = k.id_kelas
        WHERE u.id_kelas = '$kelas' AND m.id_mapel = m.id_mapel AND s.id_siswa = '$siswa' GROUP BY m.id_mapel";

        return $this->db->query($query)->result();
    }

    function cetak_grafik($kelas, $siswa) {
        $query = "
        SELECT s.nis, s.nama, m.mapel, s.id_siswa, k.kode_kelas, s.tahun_ajaran,
            (SELECT ikut_ujian.nilai
                FROM ujian 
                JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                WHERE siswa.id_siswa = '$siswa' AND ujian.nama_ujian = 'Ulangan-1' AND ujian.id_mapel = m.id_mapel) AS ulangan_1,
            (SELECT ikut_ujian.nilai
                FROM ujian 
                JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                WHERE siswa.id_siswa = '$siswa' AND ujian.nama_ujian = 'Ulangan-2' AND ujian.id_mapel = m.id_mapel) AS ulangan_2,
            (SELECT ikut_ujian.nilai
                FROM ujian 
                JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                WHERE siswa.id_siswa = '$siswa' AND ujian.nama_ujian = 'Ulangan-3' AND ujian.id_mapel = m.id_mapel) AS ulangan_3,
            (SELECT ikut_ujian.nilai
                FROM ujian 
                JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                WHERE siswa.id_siswa = '$siswa' AND ujian.nama_ujian = 'UTS' AND ujian.id_mapel = m.id_mapel) AS uts,
            (SELECT ikut_ujian.nilai
                FROM ujian 
                JOIN ikut_ujian ON ujian.id_ujian = ikut_ujian.id_ujian 
                JOIN siswa ON ikut_ujian.id_siswa = siswa.id_siswa
                WHERE siswa.id_siswa = '$siswa' AND ujian.nama_ujian = 'UAS' AND ujian.id_mapel = m.id_mapel) AS uas
        FROM siswa s
        JOIN ikut_ujian iu ON iu.id_siswa = s.id_siswa
        JOIN ujian u ON iu.id_ujian = u.id_ujian
        JOIN mapel m ON u.id_mapel = m.id_mapel
        JOIN kelas k ON s.kelas = k.id_kelas
        WHERE u.id_kelas = '$kelas' AND m.id_mapel = m.id_mapel AND s.id_siswa = '$siswa' GROUP BY m.id_mapel";

        return $this->db->query($query)->result_array();
    }    
}