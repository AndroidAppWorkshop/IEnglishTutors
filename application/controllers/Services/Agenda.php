<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('FILESPATH', './assets/files/');
define('ALLOWEDTYPES', 'gif|jpg|png|pdf|docx|pptx');
define('MAXSIZE', '2048');

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
		$startAt = date('Y-m-d H:i:s',strtotime($postdata->StartDateTime));
		$endAt = date('Y-m-d H:i:s',strtotime($postdata->EndDateTime));
		
		$result = $this->Course->Create($name, $startAt, $endAt);
		$id = $this->db->insert_id();
		$this->CreateNewDirectory(FILESPATH.$id.'/');
		$this->response->Json(array('Success' => $result,
											 'id' => $id));
	}
	
	public function Upload()
	{
		$id = $this->input->post('Id');
		$path = FILESPATH.$id.'/';
		$config = array(
			'upload_path'		=> $path,
			'allowed_types'	=> ALLOWEDTYPES,
			'file_ext_tolower'=> TRUE,
			'overwrite'			=> TRUE,
			'max_size'			=> MAXSIZE
		);
		
		$this->upload->initialize($config);
		foreach ($_FILES as $key => $value) {
			if($result = $this->upload->do_upload($key))
			{
				$file_path = $this->upload->data('file_path');
				$file_name = $this->upload->data('file_name');
				$file_type = $this->upload->data('file_ext');
				$result = $this->Course->InsertFile($id, $file_path, $file_name, $file_type);
			}
		}
		
		$this->response->Json(array('Success' => $result,
											 'Error'	  =>	$this->upload->display_errors(),
											 'FileData'=>	$this->upload->data()));
	}
	
	private function CreateNewDirectory($path)
	{
		mkdir($path, 0777, TRUE);
	}
}

/* End of file Agenda.php */
/* Location: ./application/controllers/Services/Agenda.php */