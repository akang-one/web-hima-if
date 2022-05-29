<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voting_model extends CI_Model
{
    public function read()
    {
        $query = $this->db->get('voting');
        return $query->result();
    }

    public function create()
    {
        $data = [
            'periode' => $this->input->post('inputperiode'),
            'nama_voting' => $this->input->post('inputnamavote'),
            'tgl_tutup' => $this->input->post('inputtgltutup')
        ];

        $this->db->insert('voting', $data);
    }

    public function readby($id)
    {
        $this->db->where('id_voting', $id);
        $query = $this->db->get('voting');
        return $query->row();
    }

    public function readkandidatvoting($id)
    {
        $this->db->select('*');
        $this->db->from('voting as b');
        $this->db->join('kandidat as a ', 'b.id_voting = a.id_voting');
        $this->db->where('b.id_voting', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getstatusaktif()
    {
        $this->db->like('status', '1');
        $query = $this->db->get('voting');
        return $query->row();
    }


    public function mulai($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id_voting', $id);
        $this->db->update('voting');
    }

    public function stop($id)
    {
        $this->db->set('status', 0);
        $this->db->where('id_voting', $id);
        $this->db->update('voting');
    }

    public function pilih($id_voting)
    {
        $data = [
            'id_voting' => $id_voting,
            'id_kandidat' => $this->input->post('id_kandidat'),
            'id_pemilih' => $this->session->userdata('id_pemilih')
        ];

        $this->db->insert('suara', $data);
    }

    public function ceksuara($id_voting)
    {
        $this->db->where('id_voting', $id_voting);
        $this->db->where('id_pemilih', $this->session->userdata('id_pemilih'));
        $query = $this->db->get('suara');
        return $query->row();
    }

    public function read_ikut_voting($id_vote)
    {
        $this->db->select('*');
        $this->db->from('pemilih as a');
        $this->db->join('suara as b ', 'a.id_pemilih = b.id_pemilih', 'LEFT');
        $this->db->join('anggota as c ', 'a.id_anggota = c.id_anggota', 'FULL OUTER');
        $this->db->having('b.id_voting', $id_vote);

        $query = $this->db->get();
        return $query->result();
    }
}
