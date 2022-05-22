<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kandidat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kandidat_model');
        $this->load->model('Anggota_model');
    }


    public function index()
    {
        $data['kandidat'] = $this->Kandidat_model->getketua();
        $data['wakil'] = $this->Kandidat_model->getwakil();
        $this->load->view('templates/header');
        $this->load->view('kandidat/list_kandidat', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        if ($this->input->post('submit')) {
            $this->Kandidat_model->create();
            redirect('kandidat');
        }
        $data['anggota'] = $this->Anggota_model->getallanggota();
        $this->load->view('templates/header.php');
        $this->load->view('kandidat/form_kandidat', $data);
        $this->load->view('templates/footer.php');
    }

    public function edit($id)
    {
        if ($this->input->post('submit')) {
            $this->Kandidat_model->updateanggota($id);
            redirect('kandidat');
        }
        $data['kandidat'] = $this->Kandidat_model->read_by($id);
        $this->load->view('templates/header.php');
        $this->load->view('kandidat/form_kandidat', $data);
        $this->load->view('templates/footer.php');
    }
}
