<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    /**
     * FUngsi contruct 
     * fungsi yang otomatis terpanggil ketika User.php dieksekusi
     */
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
        if ($this->session->userdata('role') == 2) redirect('admin');
        $data['user'] = $this->User_model->readall();
        $this->load->view('templates/header');
        $this->load->view('admin/user/list_user', $data);
        $this->load->view('templates/footer');
    }

    /**
     * fungsi untuk menambahkan user baru
     * menampilkan form_user
     * memanggil User_model -> create() untuk melakukan penambahan
     */
    public function add()
    {
        if ($this->session->userdata('role') == 2) redirect('admin');
        if ($this->input->post('submit')) {
            $this->User_model->create();
            redirect('user');
        }
        $this->load->view('templates/header');
        $this->load->view('admin/user/form_user');
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
        if ($this->session->userdata('role') == 2) redirect('admin');
        if ($this->input->post('submit')) {
            $this->User_model->update($id);
            redirect('user');
        }
        $data['user'] = $this->User_model->readby($id);
        $this->load->view('templates/header');
        $this->load->view('admin/user/form_user', $data);
        $this->load->view('templates/footer');
    }

    /**
     * fungsi untuk menghapus user
     * parameter $id untuk menentukan user yang akan dihapus
     * memanggil User_model -> delete() untuk melakukan hapus
     */
    public function delete($id)
    {
        if ($this->session->userdata('role') == 2) redirect('admin');
        $this->User_model->delete($id);
        redirect('user');
    }


    /**
     * Fungsi untuk melakukan login admin
     */
    public function login_admin()
    {
        if ($this->input->post('login') && $this->validation('login')) {
            $login = $this->User_model->getuser($this->input->post('username'));
            if ($login != NULL) {
                if (password_verify($this->input->post('password'), $login->password)) {
                    $data = [
                        'username' => $login->username,
                        'nama_user' => $login->nama_user,
                        'role' => $login->user_role
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                }
            }
            $this->session->set_flashdata('msg', 'Username atau Password Tidak Sesuai');
        }
        $this->load->view('admin/user/login_admin');
    }


    /**
     * Fungsi untuk melakukan logout admin
     */
    public function logout_admin()
    {
        $this->session->sess_destroy();
        redirect('user/login_admin');
    }

    /**
     * Fungsi untuk melakukan perubahan password admin
     * melakukan verifikasi password lama
     */
    public function change_pass()
    {
        if (!$this->session->userdata('username')) redirect('user/login_admin');
        if ($this->input->post('resetpass') && $this->validation('resetpass')) {
            $change = $this->User_model->getuser($this->session->userdata('username'));
            if (password_verify($this->input->post('passwordlama'), $change->password)) {
                if ($this->User_model->changepass())
                    $this->session->set_flashdata('msg', 'Password <strong>Berhasil</strong> diubah!');
                else
                    $this->session->set_flashdata('msg', 'Password <strong>Tidak Berhasil</strong> diubah!');
            } else {
                $this->session->set_flashdata('msg', 'Password lama <strong>tidak sesuai</strong>');
            }
        }
        $this->load->view('templates/header');
        $this->load->view('admin/user/change_password');
        $this->load->view('templates/footer');
    }

    /**
     * Fungsi untuk melakukan reset password admin
     */
    public function reset_password($id)
    {
        if ($this->session->userdata('role') == 2) redirect('admin');
        $this->User_model->resetpass($id);
        redirect('user');
    }

    /**
     * Fungsi untuk validasi form 
     */
    private function validation($type)
    {
        if ($type == 'login') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
        } elseif ($type == 'resetpass') {
            $this->form_validation->set_rules('passwordlama', 'Password Lama', 'required');
            $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'required');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required');
        }

        if ($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }
}
