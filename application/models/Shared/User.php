<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
	
	protected $preference;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('cookie');
		$this->load->library('session');
	}
	
	public function IsLogin()
	{
		$username = $this->session->tempdata('Username');
		$query = $this->db->get_where('member', array('Username' => $username));
		return $query->num_rows() > 0 && $this->session->tempdata('Logged');
	}
	
	public function Set($array, $second = 3600)
	{
		$this->session->set_tempdata($array, NULL, $second);
	}
	
	public function Get($key)
	{
		return $this->session->tempdata($key);
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