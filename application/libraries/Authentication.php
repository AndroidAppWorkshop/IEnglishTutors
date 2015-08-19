<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication {
		
	protected $CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('session');
		$this->CI->load->helper('url');
	}
	
	public function Authorize()
	{
		if(strcasecmp($this->CI->Router->GetCurrentFunction(), 'Login') !== 0
			&& !$this->CI->User->IsLogin())
		{
			redirect('WebPortal/Login');
		}
	}
}

/* End of file Authentication.php */
/* Location: ./application/libraries/Authentication.php */