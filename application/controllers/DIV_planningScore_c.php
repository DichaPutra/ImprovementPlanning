<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DIV_planningScore_c extends CI_Controller {

    public $nama;
    public $userid;
    public $namaDivisi;
    public $idDivisi;
    public $pesan;

    public function __construct() {
        parent::__construct();
        //inisialisasi load object awal
        $this->load->library('session');
        $this->load->model('Account_m');

        $this->nama = $this->session->userdata('nama');
        $this->userid = $this->session->userdata('id');
        $this->namaDivisi = $this->session->userdata('namaDivisi');
        $this->idDivisi = $this->session->userdata('idDivisi');

        //        pengiriman nama user
        $this->datakirim['nama'] = $this->nama;
        $this->datakirim['namaDivisi'] = $this->namaDivisi;
    }

    public function index() {
        if ($this->session->userdata('id') == NULL) {
            redirect(base_url());
        } else {
            if ($this->input->post('tahun') != NULL) {
                $tahun = $this->input->post('tahun');
            } else {
                $tahun = date('Y');
            }

            //mengambil data tahun yang ada dalam database
            $this->load->model('Improvement_m');
            $this->datakirim['tahunlist'] = $this->Improvement_m->listTahun();
            $this->datakirim['tahun'] = $tahun;
            
            //tahun sekarang
//            $tahun = date('Y') - 1; //ini dirubah karena harusnya menilainya di tahun yang sama saat membuat rencana improvement
            
            // megambil all data improvement
            $this->load->model('Departemen_m');
            $this->datakirim['departemen'] = $this->Departemen_m->getDepartemenPlanningScore($this->idDivisi, $tahun);

            //locking
            $this->load->model('Setting_m');
            $this->datakirim['setting1'] = $this->Setting_m->getSettingStats("1");

            // pesan
//            $this->datakirim['tahun'] = $tahun + 1;
            $this->datakirim['pesan'] = $this->pesan;
            $this->load->view('DIV_planningScore_v', $this->datakirim);

            // echo "ini controller dashboard Divisi | $this->userid , $this->nama | $this->idDivisi , $this->namaDivisi";
        }
    }

    public function viewImprovement($idDepartemen, $tahun) {
        $this->load->model('Improvement_m');
        $this->datakirim['improvement'] = $this->Improvement_m->getImprovementDiv($idDepartemen, $tahun);

        //kirim tahunn & dep ID untuk print
        $this->datakirim['tahun'] = $tahun;
        $this->datakirim['iddepartemen'] = $idDepartemen;

        //daa to view
        $this->load->model('Departemen_m');
        $this->datakirim['departemen'] = $this->Departemen_m->getDepartemenByID($idDepartemen);
        $this->load->view('DIV_planningScore_vp_v', $this->datakirim);

//        echo "id departemenya = $idDepartemen";
    }

    public function inputScore() {
        $tahun = $this->input->post('tahun');
        $score = $this->input->post('score');
        $comments = $this->input->post('comments');
//        $comments = '';

        $idDepartemen = $this->input->post('idDepartemen');
//                echo "iddepartemen = $idDepartemen | $score | $comments";

        $this->load->model('Planning_score_m');
        $this->Planning_score_m->insertScore($idDepartemen, $score, $comments, $tahun);

        $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Success!</strong> Score berhasil ditambahkan</div>";

        $this->index();
    }

    public function editScore() {
        $score = $this->input->post('score');
        $idScore = $this->input->post('idScore');
        //        echo "scorenya = $score | idscore = $idScore";

        $this->load->model('Planning_score_m');
        $this->Planning_score_m->editScore($score, $idScore);

        $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Success!</strong> Score berhasil diedit</div>";

        $this->index();
    }

    public function deleteScore($idScore) {
        $this->load->model('Planning_score_m');
        $this->Planning_score_m->deleteScore($idScore);

        $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Success!</strong> Score berhasil dihapus</div>";

        $this->index();
    }

    public function cetakPDF($idDepartemen, $tahun) {
        $this->load->library('fpdf');
        $this->load->model('Improvement_m');
        $this->load->model('Departemen_m');

        $namadepartemen = $this->Departemen_m->getDepartemenByID($idDepartemen);
        $improvement = $this->Improvement_m->getImprovementKPI($idDepartemen, $tahun);


        $this->fpdf = new FPDF();
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial', 'B', 16);
        $this->fpdf->Image('dist/img/logopakerin.png', 8, 10, 40, 30, '', 'www.mpowerstaff.com');
        $this->fpdf->SetFont('Arial', 'B', 20);
        $this->fpdf->Cell(90);
        $this->fpdf->Cell(20, 10, 'PT PABRIK KERTAS INDONESIA', 0, 0, 'C');
        $this->fpdf->Ln(4);
        $this->fpdf->Cell(90);
        $this->fpdf->Ln(4);
        $this->fpdf->SetFont('Arial', '', 13);
        $this->fpdf->Cell(90);
        $this->fpdf->Cell(20, 10, 'Bangun - Pungging - Mojokerto', 0, 0, 'C');

        $this->fpdf->Ln(4);
        $this->fpdf->Ln(4);
        $this->fpdf->Cell(90);
        $this->fpdf->Cell(20, 10, 'Tel. (0321) 5913779', 0, 0, 'C');

        $this->fpdf->Ln(5);
        $this->fpdf->Ln(5);
        $this->fpdf->Cell(20, 10, '_______________________________________________________________________________________________________________________________________________________', 0, 0, 'C');


        $this->fpdf->Ln(7);
        $this->fpdf->Cell(90);
        $this->fpdf->Ln(7);
        $this->fpdf->SetFont('Times', 'B', 20);
        $this->fpdf->Cell(90);
        $this->fpdf->Cell(20, 10, "$namadepartemen", 0, 0, 'C');

        $this->fpdf->Ln(4);
        $this->fpdf->Ln(4);
        $this->fpdf->Cell(90);
        $this->fpdf->SetFont('Times', 'B', 12);
        $this->fpdf->Cell(20, 10, "Improvement List Periode Th. $tahun", 0, 0, 'C');
        $this->fpdf->Ln(10);

        $no = 0;
        foreach ($improvement as $key) {
            $no++;
            $kodeimprovement = sprintf("%04s", $key->id) . "-" . sprintf("%03s", $key->Departemen_id) . "-" . $key->periode;

            $this->fpdf->Ln(12);
            $this->fpdf->SetFont('Times', 'B', 13);
            $this->fpdf->MultiCell(188, 6, "$no. [$kodeimprovement] $key->judul_improvement", 0);
            $this->fpdf->Ln(3);
            $this->fpdf->SetFont('Times', '', 11);
            $this->fpdf->MultiCell(188, 6, "$key->improvement", 0);
        }

        $this->fpdf->Output('I', "fileimprovement-$namadepartemen.pdf", false);
    }

}

?>
