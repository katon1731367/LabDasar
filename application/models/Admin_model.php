<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
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

    public function getBarangHilang(){
        return $this->db->get('barang_hilang')->result_array();
    }

    public function getInfoLab(){
        return $this->db->get('info_lab')->result_array();
    }
    
    public function getPassRecover(){
        $this->db->where('pass_recover', 1);
        return $this->db->get('user')->result_array();
    }

    public function deleteBarang($id)
    {
        $this->db->where('id_barang_hilang', $id);
        return $this->db->delete('barang_hilang');
    }

    public function deleteInfoLab($id)
    {
        $this->db->where('id_info', $id);
        return $this->db->delete('info_lab');
    }

    public function updatePassUser($id)
    {
        $data= [
            'pass_recover' => 0,
            'is_active' => '1'
        ];

        $this->db->where('nim', $id);
        return $this->db->update('user', $data);
    }
}
