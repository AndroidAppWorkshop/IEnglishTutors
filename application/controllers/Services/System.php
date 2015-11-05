<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('response', 'email'));
		$this->load->helper(array('file', 'download'));
		$this->load->model(array('Shared/Languages', 'WebPortal/Member'));
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
		$language = $this->input->get('language');
		$result = $this->User->SetPreference($language);
		$this->response->Json(array('Success' => $result));
	}
	
	public function GetLang()
	{
		$this->response->Json($this->Languages->GetAll());
	}
	
	public function GetLangUsage()
	{
		$id = $this->input->get('id', TRUE);
		$result = $this->Languages->GetUsage($id);
		$this->response->Json($result);
	}
	
	public function UpdateLangUsage()
	{
		$postdata = json_decode($this->input->raw_input_stream);
		$id = $postdata->Id;
		$content = $postdata->Content;
		$result = $this->Languages->UpdateUsage($id, $content);
		$this->response->Json(array('Success' => $result));
	}
	
	public function Download()
	{
		$path = $this->input->get('path');
		force_download($path, NULL);
	}
	
	public function SendEmail()
	{
		$config = LoadJsonFileWithEncrypt(APPPATH.'app_data/mail.server.json', TRUE);
		$this->email->initialize($config);
		$this->email->from($this->input->post('email'), $this->input->post('name'));
		$this->email->to($this->Addressee());
		$this->email->cc($this->CarbonCopy());
		$this->email->subject($this->input->post('subject'));
		$this->email->message($this->input->post('message'));
		
		$this->response->Json(array(
			'Success' => $this->email->send(),
			'Log' => $this->email->print_debugger()
		));
	}
	
	private function Addressee()
	{
		$result = array();
		$owners = $this->Member->All(1);
		foreach($owners as $owner)
		{
			array_push($result, $owner['Username']);
		}
		
		return $result;
	}
	
	private function CarbonCopy()
	{
		$result = array();
		$developers = $this->Member->All(2);
		foreach($developers as $developer)
		{
			array_push($result, $developer['Username']);
		}
		
		return $result;
	}
}

/* End of file System.php */
/* Location: ./application/controllers/Services/System.php */