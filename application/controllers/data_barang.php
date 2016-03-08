<?php
defined('BASEPATH') OR exit('id direct script access allowed');
 
class Data_barang extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_barang_model');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->template
                ->title('Data Barang','Web Application')
                ->build('data_barang');
    }
 
    public function ajax_list()
    {
        $list = $this->data_barang->get_datatables();
        $data = array();
        $id = $_POST['start'];
        foreach ($list as $data_barang) {
            $id++;
            $row = array();
            $row[] = $data_barang->merk;
            $row[] = $data_barang->kategori;
            $row[] = $data_barang->n_barang;
            $row[] = $data_barang->sn;
            $row[] = $data_barang->tgl_in;
            $row[] = $data_barang->petugas_in;
            $row[] = $data_barang->tgl_out;
            $row[] = $data_barang->tujuan;
            $row[] = $data_barang->petugas_out;
            $row[] = $data_barang->garansi_1;
            $row[] = $data_barang->garansi_2;
            $row[] = $data_barang->garansi_3;
            $row[] = $data_barang->garansi_4;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_data_barang('."'".$data_barang->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_data_barang('."'".$data_barang->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->data_barang->count_all(),
                        "recordsFiltered" => $this->data_barang->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->data_barang->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(
                'merk' => $this->input->post('merk'),
                'kategori' => $this->input->post('kategori'),
                'n_barang' => $this->input->post('n_barang'),
                'sn' => $this->input->post('sn'),
                'tgl_in' => $this->input->post('tgl_in'),
                'petugas_in' => $this->input->post('petugas_in'),
                'tgl_out' => $this->input->post('tgl_out'),
                'tujuan' => $this->input->post('tujuan'),
                'petugas_out' => $this->input->post('petugas_out'),
                'garansi_1' => $this->input->post('garansi_1'),
                'garansi_2' => $this->input->post('garansi_2'),
                'garansi_3' => $this->input->post('garansi_3'),
                'garansi_4' => $this->input->post('garansi_4')
            );
        $insert = $this->data_barang->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $data = array(
                'merk' => $this->input->post('merk'),
                'kategori' => $this->input->post('kategori'),
                'n_barang' => $this->input->post('n_barang'),
                'sn' => $this->input->post('sn'),
                'tgl_in' => $this->input->post('tgl_in'),
                'petugas_in' => $this->input->post('petugas_in'),
                'tgl_out' => $this->input->post('tgl_out'),
                'tujuan' => $this->input->post('tujuan'),
                'petugas_out' => $this->input->post('petugas_out'),
                'garansi_1' => $this->input->post('garansi_1'),
                'garansi_2' => $this->input->post('garansi_2'),
                'garansi_3' => $this->input->post('garansi_3'),
                'garansi_4' => $this->input->post('garansi_4')
            );
        $this->data_barang->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->data_barang->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
}