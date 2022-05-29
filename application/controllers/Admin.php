<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) redirect('user/login_admin');
        $this->load->model('Anggota_model');
        $this->load->model('Pemilih_model');
        $this->load->model('Kandidat_model');
        $this->load->model('Voting_model');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('admin/dashboard');
        $this->load->view('templates/footer');
    }





    // +++++++++++++++++ MANAGE ANGGOTA +++++++++++++++++++++

    public function anggota()
    {
        $data['anggota'] = $this->Anggota_model->read();
        $this->load->view('templates/header.php');
        $this->load->view('admin/anggota/list_anggota', $data);
        $this->load->view('templates/footer.php');
    }

    public function add_anggota()
    {
        if ($this->input->post('submit')) {
            if ($this->Anggota_model->validation()) {
                $this->Anggota_model->create();
                $anggotaid = $this->db->insert_id();
                $this->Pemilih_model->create($anggotaid);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('msg', '<strong>Berhasil</strong> menambahkan Data Anggota.');
                } else {
                    $this->session->set_flashdata('msg', '<strong>Gagal</strong> menambahkan Data Anggota.');
                }
                redirect('admin/anggota');
            }
        }
        $this->load->view('templates/header.php');
        $this->load->view('admin/anggota/form_anggota');
        $this->load->view('templates/footer.php');
    }

    public function edit_anggota($id)
    {
        if ($this->input->post('submit')) {
            if ($this->Anggota_model->validation()) {
                $this->Anggota_model->updateanggota($id);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('msg', '<strong>Berhasil</strong> merubah Data Anggota.');
                } else {
                    $this->session->set_flashdata('msg', '<strong>Gagal</strong> merubah Data Anggota.');
                }
                redirect('admin/anggota');
            }
        }
        $data['anggota'] = $this->Anggota_model->read_by($id);
        $this->load->view('templates/header.php');
        $this->load->view('admin/anggota/form_anggota', $data);
        $this->load->view('templates/footer.php');
    }

    public function aktif_anggota($id)
    {
        $this->Anggota_model->aktif($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<strong>Berhasil</strong> meng-aktif-kan Anggota.');
        } else {
            $this->session->set_flashdata('msg', '<strong>Gagal</strong> meng-aktif-kan Anggota.');
        }
        redirect('admin/anggota');
    }

    public function disaktif_anggota($id)
    {
        $this->Anggota_model->disaktif($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<strong>Berhasil</strong> meng-nonaktif-kan Anggota.');
        } else {
            $this->session->set_flashdata('msg', '<strong>Gagal</strong> meng-nonaktif-kan Anggota.');
        }
        redirect('admin/anggota');
    }

    public function changephoto()
    {
        $data['error'] = '';
        if ($this->input->post('uploadfile')) {
            if ($this->upload_anggota()) { //jika sukses upload
                $this->Anggota_model->changephoto($this->upload->data('file_name')); //ubah data poto di database
                $this->session->set_flashdata('msg', 'Photo <strong>Berhasil</strong> diganti.'); //pesan sukses
                redirect('admin/anggota');
            } else $data['error'] = $this->upload->display_errors(); //jika gagal upload
        }
    }

    private function upload_anggota()
    {
        $config['upload_path'] = './assets/img/anggota/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = 1024;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;

        $this->load->library('upload', $config);
        return $this->upload->do_upload('gantiphoto');
    }






    // ++++++++++++++++++++++ MANAGE PENGATURAN VOTING ++++++++++++++

    public function setting_voting()
    {

        if ($this->input->post('submit')) {
            $this->Voting_model->create();
        }
        $data['pengaturan'] = $this->Voting_model->read();
        $this->load->view("templates/header");
        $this->load->view("admin/voting/pengaturan", $data);
        $this->load->view("templates/footer");
    }

    public function daftar_hadir()
    {
        $data['voting'] = $this->Voting_model->read();
        if ($this->input->post('filter')) {
            $data['suara'] = $this->Voting_model->read_ikut_voting($this->input->post('voting'));
            $data['judul'] = $this->Voting_model->readby($this->input->post('voting'));
            $namavotingjudul = $data['judul']->nama_voting;
            $periodejudul = $data['judul']->periode;
            $this->session->set_userdata('nama_voting', $namavotingjudul);
            $this->session->set_userdata('periode', $periodejudul);
        }
        $this->load->view("templates/header");
        $this->load->view("admin/voting/daftar_hadir", $data);
        $this->load->view("templates/footer");
        $this->session->unset_userdata('nama_voting');
        $this->session->unset_userdata('periode');
    }

    public function mulai_voting($id)
    {

        if (NULL !== $this->Voting_model->getstatusaktif()) {
            $this->session->set_flashdata('msg', 'Voting tidak berhasil dimulai, ada voting lain yang sedang berlangsung');
        } else {
            $data['voting'] = $this->Voting_model->readby($id);
            $tgl = date('Y-m-j');
            $tgl_tutup = $data['voting']->tgl_tutup;
            if ($tgl < $tgl_tutup) {
                $voting_mulai = $this->Voting_model->readkandidatvoting($id);
                if ($voting_mulai != NULL) {
                    $this->Voting_model->mulai($id);
                } else {
                    $this->session->set_flashdata('msg', 'Belum ada kandidat, silahkan tambahkan di menu Data -> Daftar Kandidat');
                }
            } else {
                $this->session->set_flashdata('msg', 'Voting tidak telah berakhir, silahkan buka voting baru');
            }
        }
        redirect('admin/setting_voting');
    }

    public function stop_voting($id)
    {
        $this->Voting_model->stop($id);
        redirect('admin/setting_voting');
    }







    //+++++++++++++++++++ MANAGE KANDIDAT +++++++++++++++++++++++

    public function kandidat()
    {
        $data['kandidat'] = $this->Kandidat_model->getketua();
        $this->load->view('templates/header');
        $this->load->view('admin/kandidat/list_kandidat', $data);
        $this->load->view('templates/footer');
    }

    public function add_kandidat()
    {
        if ($this->input->post('submit')) {
            if ($this->Kandidat_model->cekkandidat($this->input->post('inputvoting'))) {
                $this->session->set_flashdata('msg', 'Kandidat tersebut <strong>Telah</strong> mengikuti Voting ini.');
                redirect('admin/add_kandidat');
            } else {
                $photo = $this->input->post('photokandidat');
                if (NULL !== $photo) {
                    $data['error'] = '';
                    if ($this->upload_kandidat()) { //jika sukses upload
                        $photo = $this->upload->data('file_name'); //ubah data poto di database
                    } else $data['error'] = $this->upload->display_errors();
                }
                if ($this->Kandidat_model->validation()) {
                    $this->Kandidat_model->create();
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('msg', '<strong>Berhasil</strong> menambahkan Kandidat.');
                    } else {
                        $this->session->set_flashdata('msg', '<strong>Gagal</strong> menambahkan Kandidat.');
                    }
                    redirect('admin/kandidat');
                }
            }
        }
        $data['anggota'] = $this->Anggota_model->read();
        $data['voting'] = $this->Voting_model->read();
        $this->load->view('templates/header.php');
        $this->load->view('admin/kandidat/form_kandidat', $data);
        $this->load->view('templates/footer.php');
    }

    public function edit_kandidat($id)
    {
        if ($this->input->post('submit')) {
            $photo = $this->input->post('photokandidat');
            if (NULL !== $photo) {
                $data['error'] = '';
                if ($this->upload_kandidat()) { //jika sukses upload
                    $photo = $this->upload->data('file_name'); //ubah data poto di database
                } else $data['error'] = $this->upload->display_errors();
            }
            if ($this->Kandidat_model->validation()) {
                $this->Kandidat_model->update($id, $photo);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('msg', '<strong>Berhasil</strong> merubah Kandidat.');
                } else {
                    $this->session->set_flashdata('msg', '<strong>Gagal</strong> merubah Kandidat.');
                }
                redirect('admin/kandidat');
            }
            redirect('admin/kandidat');
        }
        $data['anggota'] = $this->Anggota_model->read();
        $data['voting'] = $this->Voting_model->read();
        $data['kandidat'] = $this->Kandidat_model->read_by($id);
        $this->load->view('templates/header.php');
        $this->load->view('admin/kandidat/form_kandidat', $data);
        $this->load->view('templates/footer.php');
    }

    public function delete_kandidat($id)
    {
        $this->Kandidat_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<strong>Berhasil</strong> menghapus Kandidat.');
        } else {
            $this->session->set_flashdata('msg', '<strong>Gagal</strong> menghapus Kandidat.');
        }
        redirect('admin/kandidat');
    }

    private function upload_kandidat()
    {
        $config['upload_path'] = './assets/img/kandidat/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = 1024;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;

        $this->load->library('upload', $config);
        return $this->upload->do_upload('inputphoto');
    }






    // +++++++++++++++ MANAGE PEMILIH +++++++++++++++++++
    public function pemilih()
    {
        $data['pemilih'] = $this->Pemilih_model->read();
        $this->load->view('templates/header');
        $this->load->view('admin/pemilih/list_pemilih', $data);
        $this->load->view('templates/footer');
    }

    public function resetpass_pemilih($id)
    {
        $this->Pemilih_model->resetpass($id);
        redirect('admin/pemilih');
    }
}
