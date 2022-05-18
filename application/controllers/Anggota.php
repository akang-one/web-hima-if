<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
    }

    public function index()
    {
        $data['anggota'] = $this->Anggota_model->getallanggota();
        $this->load->view('templates/header.php');
        $this->load->view('anggota/list_anggota', $data);
        $this->load->view('templates/footer.php');
    }

    public function add()
    {
        if ($this->input->post('submit')) {
            $this->Anggota_model->create();
            redirect('anggota');
        }
        $this->load->view('templates/header.php');
        $this->load->view('anggota/form_anggota');
        $this->load->view('templates/footer.php');
    }

    public function edit($id)
    {
        if ($this->input->post('submit')) {
            $this->Anggota_model->updateanggota($id);
            redirect('anggota');
        }
        $data['anggota'] = $this->Anggota_model->read_by($id);
        $this->load->view('templates/header.php');
        $this->load->view('anggota/form_anggota', $data);
        $this->load->view('templates/footer.php');
    }

    public function delete($id)
    {
        $this->Anggota_model->delete($id);
        redirect('anggota');
    }
}
