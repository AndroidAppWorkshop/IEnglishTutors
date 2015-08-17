<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Response {
		
	protected $CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	public function Json($data, $code = 200)
	{
		$this->CI->output
			->set_status_header($code)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
	}
}

/* End of file Response.php */
/* Location: ./application/libraries/Response.php */