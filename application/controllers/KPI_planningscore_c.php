<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KPI_planningscore_c extends CI_Controller {

    public $nama;
    public $userid;
    public $pesan;

    public function __construct() {
        parent::__construct();
        //inisialisasi load object awal
        $this->load->library('session');
        $this->load->model('Account_m');

        $this->nama = $this->session->userdata('nama');
        $this->userid = $this->session->userdata('id');

        //        pengiriman nama user
        $this->datakirim['nama'] = $this->nama;
    }

    public function index() {
        if ($this->session->userdata('id') == NULL) {
            redirect(base_url());
        } else {
            if ($this->input->post('tahun') != NULL) {
                $year = $this->input->post('tahun');
            } else {
                $year = date('Y') + 1;
            }

            $this->load->model('Improvement_m');
            $this->datakirim['tahunlist'] = $this->Improvement_m->listTahun();
            $this->datakirim['tahun'] = $year;

            $this->load->model('Departemen_m');
            $this->datakirim['departemen'] = $this->Departemen_m->kpiPlanningScore($year);



            $this->load->view('KPI_planningscore_v', $this->datakirim);
        }
    }

    public function detailScore($idDepartemen) {
        //        echo "departemen : $idDepartemen";
        //data to view
        $this->load->model('Departemen_m');
        $this->datakirim['departemen'] = $this->Departemen_m->getDepartemenByID($idDepartemen);

        $this->load->model('Planning_score_m');
        $this->datakirim['detailscore'] = $this->Planning_score_m->kpiDetailPlanningScore($idDepartemen);


        $this->load->view('KPI_planningscore_ds_v', $this->datakirim);
    }

}