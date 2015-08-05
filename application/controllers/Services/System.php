<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Controller {
	
	public function JsonOutput(){
		$response = array('status' => 'OK');

		$this->output
		        ->set_status_header(200)
		        ->set_content_type('application/json', 'utf-8')
		        ->set_output(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
		        ->_display();
		exit;
	}

	public function Language(){
		$this->load->database();
		$query = $this->db->get('language');

		foreach ($query->result() as $row)
		{
		        echo $row->Id;
		}
		
		exit;
	}
}