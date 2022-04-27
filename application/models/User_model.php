<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    /**
     * class untuk membuat user baru berdasarkan hasil inputan dari form
     * 
     */
    public function create()
    {
        //ambil data inputan form dan simpan di variabel $data
        $data = [
            'username' => $this->input->post('inputusername'),
            'password' => password_hash('himaif1234', PASSWORD_DEFAULT),
            'nama_user' => $this->input->post('inputnamauser'),
            'user_role' => $this->input->post('inputrole')
        ];

        // data dimasukan ke database pada tabel admin
        $this->db->insert('admin', $data);
    }

    /**
     * fungsi untuk membaca atau mengambil data semua user di database
     * 
     * return sebagai objek
     */
    public function readall()
    {
        $query = $this->db->get('admin');
        return $query->result();
    }

    /**
     * fungsi untuk mengambil data user berdasarkan id
     * 
     * return sebagai array satu baris
     */
    public function readby($id)
    {
        //SELECT * FROM admin WHERE id_user="$id"
        $this->db->where('id_user', $id);
        $query = $this->db->get('admin');
        return $query->row();
    }

    /**
     * fungsi untuk mengedit data user berdasarkan inputan baru
     * 
     * update database admin
     */
    public function update($id)
    {
        //ambil data inputan form dan simpan di variabel $data
        $data = [
            'username' => $this->input->post('inputusername'),
            'nama_user' => $this->input->post('inputnamauser'),
            'user_role' => $this->input->post('inputrole')
        ];

        $this->db->where('id_user', $id);
        $this->db->update('admin', $data);
    }

    /**
     * fungsi untuk menghapus data user pada tabel admin
     * 
     */
    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('admin');
    }
}
