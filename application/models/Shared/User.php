<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
	
	protected $CI;
	protected $preference;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->CI =& get_instance();
		$this->CI->load->helper('cookie');
	}
	
	public function GetLanguage()
	{
		if(get_cookie('preference') === NULL)
		{
			$this->SetPreference();
			return $this->preference['Languages'];
		}
		
		return json_decode(get_cookie('preference'))->Languages;
	}
	
	public function SetPreference($language = 'zh-TW')
	{
		$this->preference = json_encode(array(
			'Languages' => $language));
		
		set_cookie('preference', $this->preference, 60*60*24*5);
	}
	
	public function CleanPreference()
	{
		delete_cookie('performance');
	}
}

/* End of file User.php */
/* Location: ./application/models/Shared/User.php */