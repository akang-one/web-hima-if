<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kandidat_model');
        $this->load->model('Voting_model');
        $this->load->model('Pemilih_model');
        $voting_aktif = $this->Voting_model->getstatusaktif();
        if ($voting_aktif === NULL) redirect('welcome/belum_mulai');
    }

    public function index()
    {
        $voting_aktif = $this->Voting_model->getstatusaktif();
        $voting_berjalan = $this->Voting_model->readkandidatvoting($voting_aktif->id_voting);
        $data['nama_voting'] = $voting_berjalan->nama_voting;
        $data['periode'] = $voting_berjalan->periode;
        if (!$this->session->userdata('npm')) {
            redirect('voting/login_pemilih');
        }
        if ($this->input->post('pilih')) {
            $this->Voting_model->pilih($voting_berjalan->id_voting);
            redirect('voting/selesai_voting');
        }
        $data['kandidat'] = $this->Kandidat_model->readby_voting($voting_berjalan->id_voting);
        $this->load->view('voting/voting', $data);
    }

    public function login_pemilih()
    {
        $voting_aktif = $this->Voting_model->getstatusaktif();
        $voting_berjalan = $this->Voting_model->readkandidatvoting($voting_aktif->id_voting);
        $data['nama_voting'] = $voting_berjalan->nama_voting;
        $data['periode'] = $voting_berjalan->periode;
        if ($this->input->post('login')) {
            $pemilih = $this->Pemilih_model->getPemilih($this->input->post('npm'));
            if ($pemilih != NULL) {
                if (password_verify($this->input->post('password'), $pemilih->password)) {
                    $data_pemilih = array(
                        'id_pemilih' => $pemilih->id_pemilih,
                        'nama_pemilih' => $pemilih->nama_anggota,
                        'npm' => $pemilih->npm_anggota,
                        'status_aktif' => $pemilih->status_aktif
                    );
                    $this->session->set_userdata($data_pemilih);

                    if ($this->session->userdata('status_aktif') == 1) {
                        $ceksuara = $this->Voting_model->ceksuara($voting_berjalan->id_voting);
                        if ($ceksuara != NULL) {
                            redirect('voting/selesai_voting');
                        } else {
                            redirect('voting');
                        }
                    } else {
                        redirect('voting/tidak_aktif');
                    }
                }
                $this->session->set_flashdata('msg', '<p style="color:red">Invalid username or password !!!</p>');
            }
        }
        $this->load->view('voting/login_voting', $data);
    }

    public function logout_pemilih()
    {
        // $data = ['id_pemilih', 'nama_pemilih', 'npm', 'status_suara'];
        // $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        redirect('voting/login_pemilih');
    }

    public function selesai_voting()
    {
        $voting_aktif = $this->Voting_model->getstatusaktif();
        $voting_berjalan = $this->Voting_model->readkandidatvoting($voting_aktif->id_voting);
        $data['nama_voting'] = $voting_berjalan->nama_voting;
        $data['periode'] = $voting_berjalan->periode;
        $this->load->view('voting/selesai_voting', $data);
    }

    public function tidak_aktif()
    {
        $this->load->view('voting/pemilih_tidak_aktif');
    }
}
