<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih_model extends CI_Model
{

    public function create($anggotaid)
    {
        $data = [
            'id_anggota' => $anggotaid,
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'status_aktif' => 1
        ];

        $this->db->insert('pemilih',  $data);
    }

    public function read()
    {
        $this->db->select('*');
        $this->db->from('pemilih as b');
        $this->db->join('anggota as a ', 'b.id_anggota = a.id_anggota');
        $this->db->order_by('a.npm_anggota', 'ASC');
        $this->db->where('b.status_aktif', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getPemilih($npm)
    {
        $this->db->select('*');
        $this->db->from('pemilih as b');
        $this->db->join('anggota as a ', 'b.id_anggota = a.id_anggota');
        $this->db->where('a.npm_anggota', $npm);
        $query = $this->db->get();
        return $query->row();
    }

    public function resetpass($id)
    {
        $this->db->set('password', password_hash('123456', PASSWORD_DEFAULT));
        $this->db->where('id_pemilih', $id);
        return $this->db->update('pemilih');
    }
}
