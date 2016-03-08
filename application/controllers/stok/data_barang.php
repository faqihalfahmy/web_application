<?php
 class Data_barang extends CI_Controller
 {
    function index()
  {
    $this->template
              ->title('Data Barang')
              ->build('stok/data_barang');
  }
    function ajax_view_data()
  {
   $this->load->library('Datatables');
   $this->datatables->from('stock_ppm');
   $this->datatables->select('merk,kategori,n_barang,sn,tgl_in,petugas_in,tgl_out,tujuan,petugas_out,garansi_1,garansi_2,garansi_3,garansi_4');
   echo $this->datatables->generate();
  }
 }