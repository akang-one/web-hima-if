<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih_model extends CI_Model
{

    public function create($anggotaid)
    {
        $data = [
            'id_anggota' => $anggotaid,
            'password' => password_hash('pemilu_hima123', PASSWORD_DEFAULT),
            'status_suara' => 0
        ];

        $this->db->insert('pemilih',  $data);
    }
}
