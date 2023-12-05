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
        $data['no_transaksi'] = $last_id_transaksi+1;
        $data['tgl_transaksi'] = date('Y-m-d');

        $data['data_transaksi'] = $this->Transaksi_model->getTransaksiById((int)$data['no_transaksi'])->result();
        $this->load->view('transaksi', $data);
    }

    public function tambah_barangView()
    {
        $data['no_transaksi'] = $this->input->post('no_transaksi');
        $data['barang'] = $this->Transaksi_model->getBarang()->result();

        $last_id_customer = $this->Transaksi_model->getIdCustomer()->row();
        $data['kode_customer'] = (int)$last_id_customer->kode_customer+1;
        $data['nama_customer'] = $this->input->post('nama_customer');
        $data['alamat'] = $this->input->post('alamat');
        $insertCustomer = [
            'kode_customer' => $data['kode_customer'],
            'nama_customer' => $data['nama_customer'],
            'alamat' => $data['alamat']
        ];
        $this->db->insert('tbl_customer', $insertCustomer);
        $this->load->view('customer', $data);
    }

    public function tambah_barang_existView()
    {
        $data['no_transaksi'] = $this->input->get('no_transaksi');
        $data['barang'] = $this->Transaksi_model->getBarang()->result();

        $getTransaksi = $this->Transaksi_model->getTransaksiById($data['no_transaksi'])->row();
        $data['kode_customer'] = $getTransaksi->kode_customer;
        $getCustomer = $this->Transaksi_model->getCustomer((int)$data['kode_customer'])->row();
        $data['nama_customer'] = $getCustomer->nama_customer;
        $data['alamat'] = $getCustomer->alamat;
        $this->load->view('customer', $data);
    }

    public function tambah_barang()
    {
        $data['no_transaksi'] = $this->input->post('no_transaksi');
        $data['tgl_transaksi'] = $this->input->post('tgl_transaksi');
        $data['kode_customer'] = $this->input->post('kode_customer');
        $data['nama_customer'] = $this->input->post('nama_customer');
        $data['alamat'] = $this->input->post('alamat');
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['qty'] = $this->input->post('qty');

        $cekQTY = $this->Transaksi_model->cekQTY($data['kode_barang'])->row();
        if($cekQTY->stok < $data['qty']){
            $data['stok_checker'] = true;
            $data['stok'] = $cekQTY->stok;
            $data['data_table_transaksi'] = $this->Transaksi_model->getDetailTransaksiById((int)$data['no_transaksi'])->result();
            foreach($data['data_table_transaksi'] as $t) {
                $getNamaBarang = $this->Transaksi_model->getBarangId($t->kode_barang)->row();
                $t->nama_barang = $getNamaBarang->nama_barang;
            }
            $this->load->view('transaksi', $data);
        }else{
            $getBarang = $this->Transaksi_model->getBarangId($data['kode_barang'])->row();
            $data['harga_barang'] = (int)$getBarang->harga;
            $data['subtotal_transaksi'] = (int)$getBarang->harga * (int)$data['qty'];
            $getTransaksi = $this->Transaksi_model->getTransaksiById((int)$data['no_transaksi'])->row();
    
            $data['detail_transaksi'] = $this->Transaksi_model->getDetailTransaksiById((int)$data['no_transaksi'])->result();
            if(empty($data['detail_transaksi'])) {
                $data['urut'] = 1;
                $insertTransaksi = [
                    'no_transaksi' => $data['no_transaksi'],
                    'tgl_transaksi' => $data['tgl_transaksi'],
                    'kode_customer' => $data['kode_customer'],
                    'total' => (int)$getBarang->harga * (int)$data['qty'],
                    'keterangan' => 'Lunas'
                ];
                $this->db->insert('tbl_transaksi', $insertTransaksi);
        
                $insertDetailTransaksi = [
                    'no_transaksi' => $data['no_transaksi'],
                    'tgl_transaksi' => $data['tgl_transaksi'],
                    'kode_barang' => $data['kode_barang'],
                    'urut' => $data['urut'],
                    'qty' => $data['qty'],
                    'harga' => $data['harga_barang']
                ];
                $this->db->insert('tbl_detail_transaksi', $insertDetailTransaksi);

                $updateBarang = [
                    'stok' => (int)$cekQTY->stok - (int)$data['qty']
                ];
                $this->db->where('kode_barang', $data['kode_barang'])->update('tbl_barang', $updateBarang);
            }else {
                $getUrut = $this->Transaksi_model->getLastUrut((int)$data['no_transaksi'])->row();
                $data['urut'] = (int)$getUrut->urut+1;
                $updateTransaksi = [
                    'total' => (int)$getTransaksi->total + (int)$data['subtotal_transaksi']
                ];
                $this->db->where('no_transaksi', $data['no_transaksi'])->update('tbl_transaksi', $updateTransaksi);
                
                $insertDetailTransaksi = [
                    'no_transaksi' => $data['no_transaksi'],
                    'tgl_transaksi' => $data['tgl_transaksi'],
                    'kode_barang' => $data['kode_barang'],
                    'urut' => $data['urut'],
                    'qty' => $data['qty'],
                    'harga' => $data['harga_barang']
                ];
                $this->db->insert('tbl_detail_transaksi', $insertDetailTransaksi);

                $updateBarang = [
                    'stok' => (int)$cekQTY->stok - (int)$data['qty']
                ];
                $this->db->where('kode_barang', $data['kode_barang'])->update('tbl_barang', $updateBarang);
            }
            $getTransaksi = $this->Transaksi_model->getTransaksiById((int)$data['no_transaksi'])->row();
            $data['total_transaksi'] = (int)$getTransaksi->total;
            $data['data_table_transaksi'] = $this->Transaksi_model->getDetailTransaksiById((int)$data['no_transaksi'])->result();
            foreach($data['data_table_transaksi'] as $t) {
                $getNamaBarang = $this->Transaksi_model->getBarangId($t->kode_barang)->row();
                $t->nama_barang = $getNamaBarang->nama_barang;
            }
            $this->load->view('transaksi', $data);

        }

    }
}
