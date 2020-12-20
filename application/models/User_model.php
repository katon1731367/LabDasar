<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getKelasNow($day)
    {
        $query = "SELECT `d`.`nama_dosen`, `m`.`nama_matkul`, `k`.*
                FROM `kelas` AS `k` 
                LEFT JOIN `dosen` AS `d` ON `k`.`id_dosen` = `d`.`id_dosen`
                LEFT JOIN `matakuliah` AS `m` ON `k`.`id_matkul` = `m`.`id_matkul`
                WHERE `k`.`hari` = '$day'";

        return $this->db->query($query)->result_array();
    }

    public function getKelas()
    {
        $query = "SELECT `k`.* , `m`.`nama_matkul`
                FROM `kelas` AS `k` 
                INNER JOIN `matakuliah` AS `m` ON `k`.`id_matkul` = `m`.`id_matkul`";

        return $this->db->query($query)->result_array();
    }

    public function getIdKelas()
    {
        $query = "SELECT `id_perkuliahan`
                FROM `kelas`";

        return $this->db->query($query)->result_array();
    }

    public function getJadwal($hari)
    {
        $query = "SELECT `k`.* , `m`.`nama_matkul`, `d`.`nama_dosen`
                FROM `kelas` AS `k` 
                INNER JOIN `matakuliah` AS `m` ON `k`.`id_matkul` = `m`.`id_matkul`
                INNER JOIN `dosen` AS `d` ON `k`.`id_dosen` = `d`.`id_dosen`
                WHERE `k`.`hari` = '$hari'";

        return $this->db->query($query)->result_array();
    }

    public function getAllMateri()
    {
        $query = "SELECT * FROM `materi`";
        return $this->db->query($query)->result_array();
    }

    public function getAllTugas()
    {
        $query = "SELECT * FROM `file_upload`";
        return $this->db->query($query)->result_array();
    }

    public function cekJumlahTugas($jenis, $nim, $urutan)
    {
        $query = "SELECT * FROM `file_upload` WHERE `nim` = '$nim' AND `jenis_tugas` = '$jenis' AND `urutan` = '$urutan'";
        return $this->db->query($query)->num_rows();
    }

    public function cekTugas($jenis, $nim, $urutan)
    {
        $query = "SELECT * FROM `file_upload` WHERE `nim` = '$nim' AND `jenis_tugas` = '$jenis' AND `urutan` = '$urutan'";
        return $this->db->query($query)->row_array();
    }

    public function getTugas($id_perkuliahan, $jenis)
    {
        $query = "SELECT `k`.* , `m`.`nama_matkul`, `d`.`nama_dosen`
                FROM `file_upload` AS `f` 
                INNER JOIN `mahasiswa` AS `m` ON `m`.`nim` = `f`.`nim`
                WHERE `f`.`id_perkuliahan` = '$id_perkuliahan' `and` `f`.`jenis` = '$jenis'";

        return $this->db->query($query)->result_array();
    }

    public function getAllKelas()
    {
        $query = "SELECT `d`.`nama_dosen`, `m`.`nama_matkul`, `k`.*
                FROM `kelas` AS `k` 
                LEFT JOIN `dosen` AS `d` ON `k`.`id_dosen` = `d`.`id_dosen`
                LEFT JOIN `matakuliah` AS `m` ON `k`.`id_matkul` = `m`.`id_matkul`";

        return $this->db->query($query)->result_array();
    }

    public function deleteTugas($jenis, $nim, $urutan)
    {
        $this->db->where('nim', $nim);
        $this->db->where('jenis_tugas', $jenis);
        $this->db->where('urutan', $urutan);
        return $this->db->delete('file_upload');
    }

    public function getBarangHilang(){
        return $this->db->get('barang_hilang')->result_array();
    }

    public function getInfoLab(){
        return $this->db->get('info_lab')->result_array();
    }

    public function getNilaiTugas($nim, $kelas)
    {
        $query = "SELECT `t`.`nilai`, `t`.`jenis_tugas`, `m`.`nama_matkul`
                FROM `file_upload` AS `t`
                INNER JOIN `kontrak_pc` AS `k` ON `k`.`nim` = `t`.`nim` 
                INNER JOIN `matakuliah` AS `m` ON `k`.`id_perkuliahan` = `k`.`id_perkuliahan` 
                WHERE `k`.`id_perkuliahan` = '$kelas' AND `t`.`nim` = '$nim'";

        return $this->db->query($query)->result_array();
    }

    public function getKelasMahasiswa($nim)
    {
        $query = "SELECT `k`.`id_perkuliahan`
                FROM `kontrak_pc` AS `k`
                LEFT JOIN `file_upload` AS `u` ON `k`.`nim` = `u`.`nim` 
                WHERE `u`.`nim` = '$nim'";

        return $this->db->query($query)->result_array();
    }

    public function getKelasNilai()
    {
        $query = "SELECT `k`.* , `m`.`nama_matkul`
                FROM `kelas` AS `k` 
                INNER JOIN `matakuliah` AS `m` ON `k`.`id_matkul` = `m`.`id_matkul`";

        return $this->db->query($query)->result_array();
    }

    public function getNilaiLaporanMahasiswa($id, $nim)
    {
        $query = "SELECT `urutan_laporan`, `nilai`
                FROM `nilai_laporan` WHERE `id_perkuliahan` = '$id' AND `nim` = '$nim'";
        return $this->db->query($query)->result_array();
    }

    public function getNilaiTugasMahasiswa($id, $nim)
    {
        $query = "SELECT `jenis_tugas`, `nilai`, `nama_file`, `urutan`
                FROM `file_upload` WHERE `id_perkuliahan` = '$id' AND `nim` = '$nim'";
        return $this->db->query($query)->result_array();
    }
}