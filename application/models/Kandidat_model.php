<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kandidat_model extends CI_Model
{
    public function create()
    {
        $data = [
            'ketua' => $this->input->post('inputketua'),
            'nmr_urut' => $this->input->post('inputnourut'),
            'photo' => $this->input->post('inputphoto')
        ];

        $this->db->insert('kandidat', $data);
    }


    public function getketua()
    {
        $this->db->select('*');
        $this->db->from('kandidat as b');
        $this->db->join('anggota as a ', 'b.ketua = a.id_anggota');
        $this->db->order_by('nmr_urut', 'ASC');
        $query = $this->db->get(); //SELECT * FROM cats069 JOIN catsales069 
        return $query->result(); // return as object
        // $query = $this->db->get('kandidat');
        // return $query->result();
    }

    public function read_by($id)
    {
        $this->db->where('id_kandidat', $id);
        $query = $this->db->get('kandidat');
        return $query->row();
    }

    public function update($id)
    {
        $data = [
            'ketua' => $this->input->post('inputketua'),
            'nmr_urut' => $this->input->post('inputnourut'),
            'photo' => 'default.png'
        ];

        $this->db->where('id_kandidat', $id);
        $this->db->update('kandidat', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_kandidat', $id);
        $this->db->delete('kandidat');
    }
}
