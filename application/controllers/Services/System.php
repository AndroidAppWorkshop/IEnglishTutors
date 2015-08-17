<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'models/dbo/Language.php';
require_once APPPATH.'models/dbo/Language_Usage.php';

class System extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('response');
	}
	
	public function JsonOutput()
	{
		$this->response->Json(array('status' => 'OK'));
	}

	public function LanguageWithResult()
	{
		$query = $this->db->get('language');

		foreach ($query->result() as $row)
		{
			echo $row->Id;
			echo '|';
			echo $row->Name;
			echo '<br>';
		}

		exit;
	}

	public function LanguageWithMaterialization()
	{
		$query = $this->db->get('language');

		foreach ($query->result('Language') as $language)
		{
			echo $language->Id;
			echo '|';
			echo $language->Name;
			echo '<br>';
			//echo $language->reverse_name(); // or methods defined on the 'User' class
		}

		exit;
	}

	public function LanguageWithUsage()
	{
		$this->db->where('L_Id', 2);
		$this->db->where('Name', 'Home:Lobby');
		$query = $this->db->get('language_usage');

		foreach ($query->result('Language_Usage') as $usage)
		{
			echo $usage->IsScript;
			echo '|';
			echo $usage->Content;
			echo '<br>';
		}

		exit;
	}
}

/* End of file System.php */
/* Location: ./application/controllers/Services/System.php */