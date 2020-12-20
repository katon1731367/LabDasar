<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perkuliahan_model extends CI_Model
{

    public function deleteDosen($id)
    {
        $this->db->where('id_dosen', $id);
        $this->db->delete('dosen');
    }

    public function deleteKelas($id)
    {
        $this->db->where('id_perkuliahan', $id);
        $this->db->delete('kelas');
    }

    public function deleteMateri($id)
    {
        $this->db->where('id_materi', $id);
        $this->db->delete('materi');
    }

    public function deleteTugas($id)
    {
        $this->db->where('id_file_tugas', $id);
        $this->db->delete('file_upload');
    }

    public function deleteMatakuliah($id)
    {
        $this->db->where('id_matkul', $id);
        $this->db->delete('kelas');
    }

    public function getAllMateri()
    {
        $query = "SELECT * FROM `materi`";
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

    public function getTugas($id_perkuliahan, $jenis, $urutan)
    {
        $query = "SELECT `f`.* , `u`.`name`
                FROM `file_upload` AS `f` 
                INNER JOIN `user` AS `u` ON `u`.`nim` = `f`.`nim`
                WHERE `f`.`id_perkuliahan` = '$id_perkuliahan' AND `f`.`jenis_tugas` = '$jenis' AND `f`.`urutan` = '$urutan'";

        return $this->db->query($query)->result_array();
    }

    public function getMahasiswaKelas($id_perkuliahan)
    {
        $query = "SELECT `u`.`nim` , `u`.`name`, `k`.`id_perkuliahan`
                FROM `kontrak_pc` AS `k` 
                INNER JOIN `user` AS `u` ON `u`.`nim` = `k`.`nim`
                WHERE `k`.`id_perkuliahan` = '$id_perkuliahan'";

        return $this->db->query($query)->result_array();
    }

    public function getDetailKelas($id_perkuliahan)
    {
        $query = "SELECT `u`.`nim` , `u`.`name`, `k`.*, `c`.`id_matkul` , `c`.`id_dosen`
                FROM `kontrak_pc` AS `k` 
                INNER JOIN `user` AS `u` ON `u`.`nim` = `k`.`nim`
                INNER JOIN `kelas` AS `c` ON `c`.`id_perkuliahan` = `k`.`id_perkuliahan`
                WHERE `k`.`id_perkuliahan` = '$id_perkuliahan'";

        return $this->db->query($query)->result_array();
    }

    public function getLaporanMahasiswa($id_perkuliahan, $urutan)
    {
        $query = "SELECT `n`.`nilai`, `k`.`nim`
                FROM `kontrak_pc` AS `k`
                INNER JOIN `user` AS `u` ON `k`.`nim` = `u`.`nim` 
                LEFT JOIN  `nilai_laporan` AS `n` ON `k`.`nim` = `n`.`nim`
                WHERE `n`.`id_perkuliahan` = '$id_perkuliahan' AND `n`.`urutan_laporan` = '$urutan'";

        return $this->db->query($query)->result_array();
    }

    public function getNim($id_perkuliahan){
        $this->db->select('nim');
        return $this->db->get('kontrak_pc')->result_array();
    }

    public function getKelas($id)
    {
        $query = "SELECT `d`.`nama_dosen`, `m`.`nama_matkul`, `k`.*
                FROM `kelas` AS `k` 
                LEFT JOIN `dosen` AS `d` ON `k`.`id_dosen` = `d`.`id_dosen`
                LEFT JOIN `matakuliah` AS `m` ON `k`.`id_matkul` = `m`.`id_matkul`
                WHERE `k`.`id_perkuliahan` = '$id'";

        return $this->db->query($query)->row_array();
    }

    public function getDosen()
    {
        $query = "SELECT `id_dosen`, `nama_dosen` FROM `dosen`";
        return $this->db->query($query)->result_array();
    }

    public function getMatkul()
    {
        $query = "SELECT `id_matkul`, `nama_matkul` FROM `matakuliah`";
        return $this->db->query($query)->result_array();
    }

    public function getFile()
    {
        $query = "SELECT `nama` FROM `matakuliah`";
        return $this->db->query($query)->result_array();
    }

    public function cekJumlahMateri($nama)
    {
        $this->db->where('nama_materi', $nama);
        return $this->db->get('materi')->num_rows();
    }

    public function updateNilai($id, $nilai){
        $this->db->set('nilai', $nilai);
        $this->db->where('id_file_tugas', $id);
        $this->db->update('file_upload');
    }

    public function cekLaporan($nim, $urutan, $idPerkuliahan){
        $this->db->where('nim', $nim);
        $this->db->where('urutan_laporan', $urutan);
        $this->db->where('id_perkuliahan', $idPerkuliahan);
        return $this->db->get('nilai_laporan')->num_rows();
    }

    public function cekTugas($id){
        $this->db->where('id_file_tugas', $id);
        return $this->db->get('file_upload')->row_array();
    }

    public function updateLaporan($nim, $id_perkuliahan, $urutan, $nilai){
        $this->db->set('nilai', $nilai);
        $this->db->where('nim', $nim);
        $this->db->where('urutan_laporan', $urutan);
        $this->db->where('id_perkuliahan', $id_perkuliahan);
        $this->db->update('nilai_laporan');
    }
}
