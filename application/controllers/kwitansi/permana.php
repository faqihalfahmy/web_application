<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permana extends CI_Controller {

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
				->title('KWITANSI','PERMANA')
				->build('kwitansi/permana');
		//$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */