<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('response', 'upload'));
		$this->load->helper('file');
		$this->load->model('Shared/Course');
	}
	
	public function Add()
	{
		$postdata = json_decode($this->input->raw_input_stream);
		$name = $postdata->Name;
		$startAt = date("Y-m-d H:i:s",strtotime($postdata->StartDateTime));
		$endAt = date("Y-m-d H:i:s",strtotime($postdata->EndDateTime));
		
		$result = $this->Course->Create($name, $startAt, $endAt);
		$this->response->Json(array('Success' => $result,
											 'id' => $this->db->insert_id()));
	}
}

/* End of file Agenda.php */
/* Location: ./application/controllers/Services/Agenda.php */