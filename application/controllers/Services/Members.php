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
		$postdata = json_decode(file_get_contents('php://input'));
		$email = $postdata->Email;
		$password = $postdata->Password;
		$role = $postdata->Role;
		$result = $this->Member->Create($email, $password, $role);
		$this->response->Json(array('Success' => $result));
	}
	
	public function Login()
	{
		$postdata = json_decode(file_get_contents('php://input'));
		$email = $postdata->Email;
		$password = $postdata->Password;
		$remember = property_exists($postdata, 'Remember') ? $postdata->Remember : FALSE;
		$result = $this->Member->Login($email, $password, $remember);
		$this->response->Json(array('Success' => $result));
	}
}

/* End of file Member.php */
/* Location: ./application/controllers/Services/Member.php */