<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    /**
     * fungsi index. tempat menampilkan data semua user
     */
    public function index()
    {
        $data['user'] = $this->User_model->readall();
        $this->load->view('templates/header');
        $this->load->view('user/list_user', $data);
        $this->load->view('templates/footer');
    }

    /**
     * fungsi untuk menambahkan user baru
     * menampilkan form_user
     * memanggil User_model -> create() untuk melakukan penambahan
     */
    public function add()
    {
        if ($this->input->post('submit')) {
            $this->User_model->create();
            redirect('user');
        }
        $this->load->view('templates/header');
        $this->load->view('user/form_user');
        $this->load->view('templates/footer');
    }

    /**
     * fungsi untuk mengubah data user
     * mmenampilkan form user
     * meminta parameter $id untuk melakukan perubahan user
     * memanggil User_model -> update() untuk melakukan perubahan
     */
    public function edit($id)
    {
        if ($this->input->post('submit')) {
            $this->User_model->update($id);
            redirect('user');
        }
        $data['user'] = $this->User_model->readby($id);
        $this->load->view('templates/header');
        $this->load->view('user/form_user', $data);
        $this->load->view('templates/footer');
    }

    /**
     * fungsi untuk menghapus user
     * parameter $id untuk menentukan user yang akan dihapus
     * memanggil User_model -> delete() untuk melakukan hapus
     */
    public function delete($id)
    {
        $this->User_model->delete($id);
        redirect('user');
    }
}
