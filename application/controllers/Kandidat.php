<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kandidat extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('kandidat/list_kandidat');
        $this->load->view('templates/footer');
    }
}
