<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voting_model extends CI_Model
{
    public function read()
    {
        $this->db->order_by('tgl_tutup', 'DESC');
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

    public function updateWaktu($id)
    {
        $this->db->set('tgl_tutup', $this->input->post('perpanjangVoting'));
        $this->db->where('id_voting', $id);
        $this->db->update('voting');
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
        $tgl = date('Y-m-d');
        $this->db->where('tgl_tutup >=', $tgl);
        $query = $this->db->get('voting');
        return $query->row();
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
        $sql = "SELECT anggota.npm_anggota , anggota.nama_anggota, anggota.kelas, voting.id_voting, suara.waktu FROM pemilih JOIN anggota ON pemilih.id_anggota = anggota.id_anggota JOIN voting LEFT JOIN suara ON voting.id_voting = suara.id_voting AND pemilih.id_pemilih = suara.id_pemilih HAVING voting.id_voting = ? ORDER BY anggota.npm_anggota";
        $query = $this->db->query($sql, array($id_vote));
        return $query->result();
    }

    public function hasil_vote($id_vote)
    {
        $this->db->select('kandidat.id_voting,kandidat.nmr_urut, anggota.nama_anggota,COUNT(suara.id_pemilih) AS total');
        $this->db->from('suara');
        $this->db->join('kandidat', 'suara.id_kandidat = kandidat.id_kandidat', 'RIGHT');
        $this->db->join('anggota', 'kandidat.ketua = anggota.id_anggota');
        $this->db->group_by('kandidat.ketua');
        $this->db->having('id_voting', $id_vote);
        $this->db->order_by('kandidat.nmr_urut');
        $query = $this->db->get();
        return $query->result();
    }
}
