<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('PHOTOPREFIX', 'member_');
define('PHOTOPATH', './assets/images/Members/');

class Members extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('response', 'upload'));
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
			$member['Key'] = '?k='.strtotime($member['LastLogin']);

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
	
	public function UpdatePhoto()
	{
		$id = $this->User->Get('Id');
		$fileName = PHOTOPREFIX.$this->User->Get('Id');
		$this->DeleteExistsedFiles($fileName);
		$config = array(
			'upload_path'		=> PHOTOPATH,
			'allowed_types'	=> 'gif|jpg|png',
			'file_name'			=> $fileName,
			'file_ext_tolower'=> TRUE,
			'overwrite'			=> TRUE,
			'max_size'			=> '1024'
		);
		
		$this->upload->initialize($config);
		
		foreach ($_FILES as $key => $value) {
			if($result = $this->upload->do_upload($key))
			{
				$result = $this->Member->UpdatePicture($id, $this->upload->data('file_name'));
			}
		}
		
		$this->response->Json(array(
										'Success'	=>	$result,
										'Error'		=>	$this->upload->display_errors(),
										'FileData'	=>	$this->upload->data()));
	}
	
	private function DeleteExistsedFiles($name)
	{
		$types = array('.gif', '.jpg', '.png');
		
		foreach ($types as $key => $value) {
			$path = PHOTOPATH.$name.$value;
			if(file_exists($path))
			{
				unlink($path);
			}
		}
	}
}

/* End of file Member.php */
/* Location: ./application/controllers/Services/Member.php */