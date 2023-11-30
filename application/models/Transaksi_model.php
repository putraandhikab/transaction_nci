<?php

class Transaksi_model extends CI_Model {
    
    public function getIdTransaksi(){
        return $this->db->query("SELECT no_transaksi FROM tbl_transaksi DESC LIMIT 1");
    }

}

?>