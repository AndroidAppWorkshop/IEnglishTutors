<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function ViewJson($currentPath = '')
	{
		$this->db->select('VarName, Content');
		$this->db->from('language_usage');
		$this->db->join('language', 'language.Id = language_usage.L_Id');
		$this->db->where('language.Name', 'zh-TW');
		$this->db->where('language_usage.Name', $currentPath);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->VarName.'='.$row->Content;
		}

		return null;
	}
}

/* End of file Layout.php */
/* Location: ./application/models/Shared/Layout.php */