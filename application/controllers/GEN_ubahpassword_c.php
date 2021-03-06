<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Pada class controller ini digunakan untuk proses login, pegecekan
class GEN_ubahpassword_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //inisialisasi load object awal
        $this->load->library('session');
        $this->load->model('Account_m');
    }

    public function index() {
        if ($this->session->userdata('id') == NULL) {
            $this->load->view('ubahpassword_v');
        } else {
            //echo 'masih ada session , redirect ke dashboard';
            if ($this->session->userdata('idDivisi') != NULL) {
                // redirct Dashboard Divisi
                redirect(base_url() . 'index.php/DIV_planningScore_c');
            } elseif ($this->session->userdata('idDepartemen') != NULL) {
                // redirect Dashboard Departemen
                redirect(base_url() . 'index.php/DEP_rencanaimprovement_c');
            }
        }
    }

    public function ubahPass() {
        $username = $this->input->post('username');
        $passlama = $this->input->post('passlama');
        $passbaru = $this->input->post('passbaru');
        $repassbaru = $this->input->post('repassbaru');

//        $this->load->model('Account_m');
//        $akun = $this->Account_m->getPass($username);
//
//        var_dump($akun);
//        $passlamadb;

        if (!$this->Account_m->cekAccount($username)) {
            //bila username telah terdfatar
            echo '<script>alert("username not found");</script>';
            $this->index();
        } else {
            $akun = $this->Account_m->selectAccount($username);
//            echo $akun[0]['pass'];
            if ($passlama != $akun[0]['pass']) {
                echo '<script>alert("Wrong old password");</script>';
                $this->index();
            } elseif ($passbaru != $repassbaru) {
                echo '<script>alert("New Password confirmation not match");</script>';
                $this->index();
            } else {
                $this->Account_m->changePass($akun[0]['id'],$passbaru);
                echo '<script>alert("Change password success !");</script>';
                $this->index();
            }
//            var_dump($akun);
        }
//        echo "$username | $passlama | $passbaru | $repassbaru";
    }

}