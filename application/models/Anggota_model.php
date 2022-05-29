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

    public function read()
    {
        $this->db->order_by('status_aktif', 'DESC');
        $this->db->order_by('npm_anggota', 'ASC');
        $query = $this->db->get('anggota');
        return $query->result();
    }

    public function getanggota()
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

    public function aktif($id)
    {
        $this->db->set('status_aktif', 1);
        $this->db->where('id_anggota', $id);
        $this->db->update('anggota');

        $this->db->set('status_aktif', 1);
        $this->db->where('id_anggota', $id);
        $this->db->update('pemilih');
    }

    public function disaktif($id)
    {
        $this->db->set('status_aktif', 0);
        $this->db->where('id_anggota', $id);
        $this->db->update('anggota');

        $this->db->set('status_aktif', 0);
        $this->db->where('id_anggota', $id);
        $this->db->update('pemilih');
    }

    public function getidanggota()
    {
        $this->db->select('id_anggota');
        $query = $this->db->get('anggota');
        return $query->result();
    }

    public function changephoto($photo)
    {
        if ($this->input->post('photolama') !== 'default.png')
            unlink('./assets/img/anggota/' . $this->input->post('photolama')); //menghapus photo yang lama

        $this->db->set('photo', $photo);
        $this->db->where('id_anggota', $this->input->post('id_anggota'));
        return $this->db->update('anggota');
    }

    public function validation()
    {
        $this->form_validation->set_rules('inputnpm', 'NPM', 'required|numeric');
        $this->form_validation->set_rules('inputnama', 'Nama', 'required');
        $this->form_validation->set_rules('inputtahunmasuk', 'Tahun Masuk', 'required|numeric');
        $this->form_validation->set_rules('inputkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('inputemail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('inputkontak', 'Nomor Kontak', 'required|numeric');

        if ($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }
}
