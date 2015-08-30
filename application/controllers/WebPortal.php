<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebPortal extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('Authentication');
		$this->authentication->Authorize();
	}
	
	public function Index()
	{
		$this->load->Render();
	}

	public function Login()
	{
		$this->load->Render();
	}
	
	public function MailServerSetting()
	{
		$this->load->Render();
	}
	
	public function ViewResources()
	{
		$this->load->Render();
	}
	
	public function Members()
	{
		$this->User->Get();
		$this->load->Render();
	}
}

/* End of file WebPortal.php */
/* Location: ./application/controllers/WebPortal.php */