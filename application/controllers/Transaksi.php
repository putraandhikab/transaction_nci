<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Transaksi_model');
    }

    public function index()
    {
        $getlast_id_transaksi = $this->Transaksi_model->getIdTransaksi()->row();
        $last_id_transaksi = (int)$getlast_id_transaksi->no_transaksi;
        $data['id_transaksi'] = $last_id_transaksi+1;

        $data['barang'] = $this->Transaksi_model->getBarang()->result();
        $this->load->view('customer', $data);
    }

	public function hitung_transaksi()
	{
        $data['no_transaksi'] = $this->input->post('no_transaksi');
        $data['tgl_transaksi'] = $this->input->post('tgl_transaksi');
        $data['nama_customer'] = $this->input->post('nama_customer');
        $data['alamat'] = $this->input->post('alamat');
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['qty'] = $this->input->post('qty');
        
        $getBarang = $this->Transaksi_model->getBarangId($data['kode_barang'])->row();
        $data['harga_barang'] = (int)$getBarang->harga;
        $last_id_customer = $this->Transaksi_model->getIdCustomer()->row();

        $insertCustomer = [
            'kode_customer' => (int)$last_id_customer->kode_customer+1,
            'nama_customer' => $data['nama_customer'],
            'alamat' => $data['alamat']
        ];
        $this->db->insert('tbl_customer', $insertCustomer);

        $insertDetailTransaksi = [
            'no_transaksi' => $data['no_transaksi'],
            'tgl_transaksi' => $data['tgl_transaksi'],
            'kode_barang' => $data['kode_barang'],
            'urut' => 1,
            'qty' => $data['qty'],
            'harga' => $data['harga_barang']
        ];
        $this->db->insert('tbl_detail_transaksi', $insertDetailTransaksi);
        
        $insertTransaksi = [
            'no_transaksi' => $data['no_transaksi'],
            'tgl_transaksi' => $data['tgl_transaksi'],
            'kode_customer' => (int)$last_id_customer->kode_customer+1,
            'total' => (int)$getBarang->harga * (int)$data['qty'],
            'keterangan' => 'Lunas'
        ];
        $this->db->insert('tbl_transaksi', $insertTransaksi);

        $data['nama_barang'] = $getBarang->nama_barang;
        $data['data_transaksi'] = $this->Transaksi_model->getTransaksiById((int)$data['no_transaksi'])->result();
        // var_dump($data);die;
		$this->load->view('transaksi', $data);
	}
}
