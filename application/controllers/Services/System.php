<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('response', 'email'));
		$this->load->helper('file');
	}
	
	public function JsonOutput()
	{
		$this->response->Json(array('Success' => TRUE));
	}
	
	public function SaveMailServer()
	{
		$postdata = json_decode($this->input->raw_input_stream);
		$account = $postdata->Account;
		$password = $postdata->Password;
		$result = $this->email->SaveMailServer($account, $password);
		$this->response->Json(array('Success' => $result));
	}
	
	public function SavePreference()
	{
		$language = $this->input->get('language', TRUE);
		$result = $this->User->SetPreference($language);
		$this->response->Json(array('Success' => $result));
	}
}

/* End of file System.php */
/* Location: ./application/controllers/Services/System.php */