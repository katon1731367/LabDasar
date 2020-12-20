<?php

class Seat_model extends CI_Model
{
    public function getAllSeat()
    {
        return $this->db->get('kontrak_pc')->result_array();
    }

    public function editDataKursi()
    {
        $data = [
            "nim" => $this->input->post('nim', true),
            "id_perkuliahan" => $this->input->post('id_perkuliahan', true),
            "no_pc" => $this->input->post('no_pc', true)
        ];

        $this->db->where('no_pc', $data['no_pc']);
        $this->db->update('kontrak_pc', $data);
    }

    public function getSeat($kelas)
    {
        return $this->db->get_where('kontrak_pc', ['id_perkuliahan' => $kelas])->result_array();
    }

    public function getKelas(){
        $query = "SELECT `k`.* , `m`.`nama_matkul`
                FROM `kelas` AS `k` 
                INNER JOIN `matakuliah` AS `m` ON `k`.`id_matkul` = `m`.`id_matkul`";

        return $this->db->query($query)->result_array();
    }
}
