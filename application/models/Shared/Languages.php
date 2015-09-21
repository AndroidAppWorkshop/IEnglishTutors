<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Languages extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function GetAll($excludeId = FALSE)
	{
		$query = $this->db->get('language');
		
		if($excludeId)
		{
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				array_push($result, $row['Name']);
			}
			
			return $result;
		}
		
		return $query->result_array();
	}
	
	public function GetUsage($id)
	{
		$query = $this->db->get_where('language_usage', array('L_Id' => $id));

		return $query->result_array();
	}
	
	public function UpdateUsage($id, $content)
	{
		return $this->db->where('Id', $id)
					->update('language_usage', array('Content' => $content,
								'Date' => date('Y-m-d H:i:s')));
	}
}

/* End of file Languages.php */
/* Location: ./application/models/Shared/Languages.php */