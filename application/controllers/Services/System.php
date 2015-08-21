<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('response');
	}
	
	public function JsonOutput()
	{
		$this->response->Json(array('Success' => TRUE));
	}
}

/* End of file System.php */
/* Location: ./application/controllers/Services/System.php */