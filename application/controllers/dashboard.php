<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library(array('form_validation','template'));
        
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }

	public function index()
	{
		
		$this->template
				->title('Dashboard','Web Application PT. Permana Putra Mandiri')
				->build('dashboard');
		//$this->load->view('welcome_message');
	}

    function logout(){
        $this->session->unset_userdata('username');
        redirect('login');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */