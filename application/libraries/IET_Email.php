<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IET_Email extends CI_Email{
	
	protected $CI;
	
	public function __construct(array $config = array())
	{
		parent::__construct($config);

		$this->CI =& get_instance();
		$this->CI->load->helper('file');
		$this->CI->load->model('Shared/Environment');
		$this->set_newline("\r\n");
	}
	
	public function SaveMailServer($account, $password)
	{
		if($this->CI->Environment->IsDevelopment())
		{
			$config = array(
				'protocol' => 'smtp' ,
				'smtp_host'=> 'ssl://smtp.googlemail.com',
				'smtp_port'=> '465',
				'smtp_user'=> $account,
				'smtp_pass'=> $password,
				'charset'  => 'utf-8',
				'wordwrap' => TRUE
			);
		}
		else
		{
			$config = array(
				'protocol' => 'smtp' ,
				'smtp_host'=> 'mail.ienglishtutors.com',
				'smtp_port'=> '25',
				'smtp_user'=> $account,
				'smtp_pass'=> $password,
				'charset'  => 'utf-8',
				'wordwrap' => TRUE
			);
		}

		WriteJsonFileWithEncrypt(APPPATH.'app_data/mail.server.json', $config);
		
		return TRUE;
	}
}

/* End of file IET_Email.php */
/* Location: ./application/libraries/IET_Email.php */