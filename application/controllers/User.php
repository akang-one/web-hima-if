<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('user/home_user');
        $this->load->view('templates/footer');
    }
}
