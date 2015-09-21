<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('response', 'upload'));
		$this->load->helper('file');
	}
	
	public function Add()
	{
		$postdata = json_decode($this->input->raw_input_stream);
		$name = $postdata->Name;
		$startAt = $postdata->StartDateTime;
		$endAt = $postdata->EndDateTime;
	}
}

/* End of file Agenda.php */
/* Location: ./application/controllers/Services/Agenda.php */