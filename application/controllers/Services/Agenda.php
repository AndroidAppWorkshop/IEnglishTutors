<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('FILESPATH', './assets/files/');
define('ALLOWEDTYPES', 'gif|jpg|png|pdf|docx|pptx');
define('MAXSIZE', '10240');

class Agenda extends CI_Controller {
	
	protected $currentDate;
	protected $lastMonth;
	protected $nextMonth;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('response', 'upload'));
		$this->load->helper('file');
		$this->load->model('Shared/Course');
		
		$this->currentDate = strtotime(date('Y-m-d H:i:s'));
		$this->lastMonth = date('Y-m-t H:i:s',strtotime('last month', $this->currentDate));
		$this->nextMonth = date('Y-m-t H:i:s',strtotime('next month', $this->currentDate));
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
	
	public function Update()
	{
		$postdata = json_decode($this->input->raw_input_stream);
		$id = $postdata->Id;
		$name = $postdata->Name;
		$startAt = date('Y-m-d H:i:s',strtotime($postdata->StartDateTime));
		$endAt = date('Y-m-d H:i:s',strtotime($postdata->EndDateTime));
		
		$result = $this->Course->Update($id, $name, $startAt, $endAt);
		$this->response->Json(array('Success' => $result));
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
	
	public function Get()
	{
		$result = $this->Course->Get();
		$this->response->Json($result);
	}
	
	public function Delete()
	{
		$postdata = json_decode($this->input->raw_input_stream);
		$id = $postdata->Id;
		$this->Course->Delete($id);
		$result = $this->DeleteDirectory(FILESPATH.$id);
		$this->response->Json(array('Success' => $result));
	}
	
	private function CreateNewDirectory($path)
	{
		mkdir($path, 0777, TRUE);
	}
	
	private function DeleteDirectory($path)
	{
		delete_files($path, TRUE);
		return rmdir($path);
	}
}

/* End of file Agenda.php */
/* Location: ./application/controllers/Services/Agenda.php */