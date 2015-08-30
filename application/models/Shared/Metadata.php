<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metadata extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function Build()
	{
		$query = $this->db->get('metadata');
		
		return $query->first_row();
	}
}

/* End of file Metadata.php */
/* Location: ./application/models/Shared/Metadata.php */