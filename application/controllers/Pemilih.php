<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pemilih_model');
    }

    public function index()
    {

        $this->load->view('templates/header');
        $this->load->view('pemilih/list_pemilih');
        $this->load->view('templates/footer');
    }
}
