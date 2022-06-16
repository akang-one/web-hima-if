<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kandidat_model extends CI_Model
{
    public function create($photo = 'default.png')
    {
        $data = [
            'id_voting' => $this->input->post('inputvoting'),
            'ketua' => $this->input->post('inputketua'),
            'nmr_urut' => $this->input->post('inputnourut'),
            'motto' => $this->input->post('inputmotto'),
            'keterangan' => $this->input->post('inputketerangan'),
            'photo_kandidat' => $photo
        ];

        $this->db->insert('kandidat', $data);
    }

    public function getketua($id_voting)
    {
        $this->db->select('*');
        $this->db->from('kandidat as b');
        $this->db->join('anggota as a ', 'b.ketua = a.id_anggota');
        $this->db->join('voting as c ', 'b.id_voting = c.id_voting');
        // $this->db->order_by('b.id_voting', 'DESC');
        $this->db->where('b.id_voting', $id_voting);
        $this->db->order_by('b.nmr_urut', 'ASC');
        $query = $this->db->get();
        return $query->result(); // return as object

    }

    public function read_by($id)
    {
        $this->db->where('id_kandidat', $id);
        $query = $this->db->get('kandidat');
        return $query->row();
    }

    public function update($id, $photo)
    {
        if ($this->input->post('photokandidat') !== $photo && $this->input->post('photokandidat') !== 'default.png')
            unlink('./assets/img/kandidat/' . $this->input->post('photokandidat')); //menghapus photo yang lama

        $data = [
            'nmr_urut' => $this->input->post('inputnourut'),
            'motto' => $this->input->post('inputmotto'),
            'keterangan' => $this->input->post('inputketerangan'),
            'photo_kandidat' => $photo
        ];

        $this->db->where('id_kandidat', $id);
        $this->db->update('kandidat', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_kandidat', $id);
        $this->db->delete('kandidat');
    }

    public function readby_voting($vote_id)
    {
        $this->db->select('*');
        $this->db->from('kandidat as b');
        $this->db->join('anggota as a ', 'b.ketua = a.id_anggota');
        $this->db->where('id_voting', $vote_id);
        $this->db->order_by('nmr_urut');
        $query = $this->db->get();
        return $query->result();
    }

    public function cekkandidat($id_voting)
    {
        $kandidat = $this->readby_voting($id_voting);
        foreach ($kandidat as $data) :
            if ($this->input->post('inputketua') == $data->ketua) {
                return TRUE;
                break;
            }
        endforeach;
        return false;
    }

    public function validation()
    {
        $this->form_validation->set_rules('inputvoting', 'Voting', 'required');
        $this->form_validation->set_rules('inputketua', 'Kandidat', 'required');
        $this->form_validation->set_rules('inputnourut', 'Nomor Urut', 'required|numeric');

        if ($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }
}
