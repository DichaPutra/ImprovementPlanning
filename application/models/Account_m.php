<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account_m extends CI_Model {

    function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

    function cekAccount($username) {
        // fungsi cekAkun return TRUE bila akun telah terdaftar
        $query = $this->db->query("SELECT * FROM `Account` WHERE username = '$username'");
        if ($query->result_array() != NULL) {
            //bila sudah terdaftar return TRUE
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function selectAccount($username) {
        //fungsi untuk pengambilan data Akun
        $query = $this->db->query("SELECT * FROM `Account` WHERE username = '$username'");
        return $query->result_array();
    }

    function selectDivisi($id) {
        $query = $this->db->query("SELECT * FROM `Divisi` WHERE Account_id = '$id'");
        return $query->result_array();
    }

    function selectDepartemen($id) {
        $query = $this->db->query("SELECT * FROM `Departemen` WHERE Account_id = '$id'");
        return $query->result_array();
    }

    function getPass($username) {
        // fungsi cekAkun return TRUE bila akun telah terdaftar
        $query = $this->db->query("SELECT * FROM `Account` WHERE username = '$username'");
        $data = $query->result_array();
        return $data[0][2];
    }

    function changePass($idakun, $passbaru) {
        $this->db->query("UPDATE  `account` SET  `pass` =  '$passbaru' WHERE `id` = $idakun");
    }

    // ================ [ M A N A G E   A C C O U N T  K P I ] ===========================================
    // ======= DIVISI =============

    function getDivisionAccount() {
        $query = $this->db->query("
            SELECT * , (SELECT COUNT(id) FROM departemen where Divisi_id = a.id) AS jumlah_departemen
            FROM  `divisi` a, account b
            WHERE a.`Account_id` = b.id");
        return $query->result();
    }

    function editNamaDivisi($namaDivisi, $idDivisi) {
        $query = $this->db->query("
            UPDATE  `divisi` SET  `namaDivisi` =  '$namaDivisi' WHERE  `divisi`.`id` = $idDivisi;           
            ");
    }

    function editNamaAccount($namaAccount, $idAccount) {
        $query = $this->db->query("
            UPDATE  `account` SET  `nama` =  '$namaAccount' WHERE  `account`.`id` = $idAccount;            
            ");
    }

    // =========== DEPARTEMEN ==============
    // ==== KPI manage departement =====

    function getDepartmentAccount() {
        $query = $this->db->query("
                SELECT * , b.id AS account_id , a.id AS departemen_id
                FROM  `departemen` a, account b, divisi c
                WHERE a.`Account_id` = b.id
                AND a.Divisi_id = c.id
            ");
        return $query->result();
    }

    function editNamaDepartemen($namaDepartemen, $idDepartemen) {
        $query = $this->db->query("
            UPDATE  `departemen` SET  `namaDepartemen` =  '$namaDepartemen' 
            WHERE  `departemen`.`id` = $idDepartemen; 
            ");
    }

    function editPosisiDivisi($idDivisi, $idDepartemen) {
        $query = $this->db->query("
            UPDATE  `departemen` SET  `Divisi_id` =  '$idDivisi' 
            WHERE  `departemen`.`id` = $idDepartemen; 
            ");
    }

    function getDivisi() {
        $query = $this->db->query("
            SELECT  id AS id_divisi, namaDivisi
            FROM  divisi
            ");
        return $query->result();
    }

    function addAccount($namaDepartemen, $namaKadep, $idDivisi, $userid, $password) {
        $this->db->query("
            INSERT INTO `account` (`id`, `username`, `pass`, `tipe`, `nama`) 
            VALUES (NULL, '$userid', '$password', 'departemen', '$namaKadep');
            ");

        //select id yang barusaan di insert ke tabel account
        $this->db->select('id');
        $this->db->from('account');
        $where = array('username' => $userid, 'pass' => $password, 'nama' => $namaKadep);
        $this->db->where($where);
        $query2 = $this->db->get();
        $idinsert = $query2->row_array();
        $idinsertjadi = $idinsert['id'];

        $this->db->query("
            INSERT INTO `departemen`(`id`, `Divisi_id`, `Account_id`, `namaDepartemen`) 
            VALUES (NULL, '$idDivisi', '$idinsertjadi', '$namaDepartemen');
            ");
    }

    function deleteScoreImprovement($deptid) {
        $this->db->query("DELETE FROM `improvement` WHERE `Departemen_id` = $deptid");
        $this->db->query("DELETE FROM `planning_score` WHERE `Departemen_id` = $deptid");
        $this->db->query("DELETE FROM `realization_score` WHERE `Departemen_id` = $deptid");
    }

    function deleteDepartemen($deptid) {
        $this->db->query("DELETE FROM `departemen` WHERE `id` = $deptid");
    }
    
    function deleteAcc($id){
        $this->db->query("DELETE FROM `account` WHERE `id` = $id");
    }

}