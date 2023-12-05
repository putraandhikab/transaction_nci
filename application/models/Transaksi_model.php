<?php

class Transaksi_model extends CI_Model {
    
    public function getIdTransaksi(){
        return $this->db->query("SELECT no_transaksi FROM tbl_transaksi ORDER BY no_transaksi DESC LIMIT 1");
    }

    public function getIdCustomer(){
        return $this->db->query("SELECT kode_customer FROM tbl_customer ORDER BY kode_customer DESC LIMIT 1");
    }

    public function getBarangId($kode_barang){
        return $this->db->query("SELECT * FROM tbl_barang WHERE kode_barang = '$kode_barang'");
    }

    public function getBarang(){
        return $this->db->query("SELECT * FROM tbl_barang");
    }

    public function getCustomer($kode_customer){
        return $this->db->query("SELECT * FROM tbl_customer WHERE kode_customer = $kode_customer");
    }

    public function getTransaksiById($no_transaksi){
        return $this->db->query("SELECT * FROM tbl_transaksi WHERE no_transaksi = $no_transaksi");
    }

    public function getDetailTransaksiById($no_transaksi){
        return $this->db->query("SELECT * FROM tbl_detail_transaksi WHERE no_transaksi = $no_transaksi");
    }

    public function getLastUrut($no_transaksi){
        return $this->db->query("SELECT urut FROM tbl_detail_transaksi WHERE no_transaksi = $no_transaksi ORDER BY urut DESC LIMIT 1");
    }

    public function cekQTY($kode_barang){
        return $this->db->query("SELECT stok FROM tbl_barang WHERE kode_barang = '$kode_barang'");
    }

}

?>