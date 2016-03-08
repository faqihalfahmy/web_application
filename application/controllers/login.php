<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model(array('m_login'));
    }

	public function index()
	{
		
		$this->template
				->title('login','Web Application PT. Permana Putra Mandiri')
                ->set_layout('login')
				->build('login');
		//$this->load->view('welcome_message');
	}

    function proses(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','password','required|trim|xss_clean');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','<div class="callout callout-danger lead"><h5>Please Input Username and Password!</h5></div>');
            redirect('login');
        }else{
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $cek=$this->m_login->cek($username,$password);
            if($cek->num_rows()>0){
                //login berhasil, buat session
                $this->session->set_userdata('username',$username);
                redirect('dashboard');
                
            }else{
                //login gagal
                $this->session->set_flashdata('message','<div class="callout callout-danger lead"><h5>Invalid Username or Password!</h5></div>');
                redirect('login');
            }
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */