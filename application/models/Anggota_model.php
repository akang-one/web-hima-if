<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    public function create()
    {
        $data = [
            'npm_anggota' => $this->input->post('inputnpm'),
            'nama_anggota' => $this->input->post('inputnama'),
            'kelas' => $this->input->post('inputkelas'),
            'tahun_masuk' => $this->input->post('inputtahunmasuk'),
            'email' => $this->input->post('inputemail'),
            'nomor_kontak' => $this->input->post('inputkontak')
        ];

        $this->db->insert('anggota', $data);
    }

    public function getallanggota()
    {
        $query = $this->db->get('anggota');
        return $query->result();
    }

    public function read_by($id)
    {
        $this->db->where('id_anggota', $id);
        $query = $this->db->get('anggota');
        return $query->row();
    }

    public function updateanggota($id)
    {
        $data = [
            'npm_anggota' => $this->input->post('inputnpm'),
            'nama_anggota' => $this->input->post('inputnama'),
            'kelas' => $this->input->post('inputkelas'),
            'tahun_masuk' => $this->input->post('inputtahunmasuk'),
            'email' => $this->input->post('inputemail'),
            'nomor_kontak' => $this->input->post('inputkontak')
        ];

        $this->db->where('id_anggota', $id);
        $this->db->update('anggota', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->delete('anggota');
    }
}
