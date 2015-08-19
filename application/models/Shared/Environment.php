<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Environment extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
	}

	public function IsDevelopment()
	{
		$currentEnvironment = base_url();
		
		return FALSE !== stristr($currentEnvironment, "localhost");
	}
}

/* End of file Environment.php */
/* Location: ./application/models/Shared/Environment.php */