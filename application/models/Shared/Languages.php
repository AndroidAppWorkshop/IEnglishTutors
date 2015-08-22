<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Languages extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function Get()
	{
		$result = array();
		$query = $this->db->select('Name')
								->get('language');
		
		foreach ($query->result_array() as $row)
		{
			array_push($result, $row['Name']);
		}
		
		return $result;
	}
}

/* End of file Languages.php */
/* Location: ./application/models/Shared/Languages.php */