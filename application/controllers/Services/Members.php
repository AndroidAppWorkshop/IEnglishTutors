<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('response');
		$this->load->model('WebPortal/Member');
	}
	
	public function Create()
	{
		$postdata = json_decode($this->input->raw_input_stream);
		$email = $postdata->Email;
		$password = $postdata->Password;
		$role = $postdata->Role;
		$result = $this->Member->Create($email, $password, $role);
		$this->response->Json(array('Success' => $result));
	}
	
	public function Login()
	{
		$postdata = json_decode($this->input->raw_input_stream);
		$email = $postdata->Email;
		$password = $postdata->Password;
		$remember = property_exists($postdata, 'Remember') ? $postdata->Remember : FALSE;
		$result = $this->Member->Login($email, $password, $remember);
		$this->response->Json(array('Success' => $result));
	}
	
	public function Logout()
	{
		$result = $this->Member->Logout();
		$this->response->Json(array('Success' => $result));
	}
	
	public function UsernameAvailable()
	{
		$username = $this->input->get('username', TRUE);
		$result = $this->Member->UsernameAvailable($username);
		$this->response->Json(array('Success' => $result));
	}
	
	public function All()
	{
		$userId = $this->User->Get('Id');
		$data = $this->Member->All();
		foreach ($data as &$member) {
			if($member['Id'] === $userId)
			{
				$member['CanEdit'] = TRUE;
			}
		}
		
		$this->response->Json($data);
	}
	
	public function Update()
	{
		$postdata = json_decode($this->input->raw_input_stream);
		$result = $this->Member->Update($postdata);
		$this->response->Json(array('Success' => $result));
	}
}

/* End of file Member.php */
/* Location: ./application/controllers/Services/Member.php */