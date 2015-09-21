<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function Create($title, $start, $end)
	{
		$course = array(
			'Title' => $title,
			'StartAt' => $start,
			'EndAt' => $end
		);
		
		return $this->db->insert('course', $course);
	}
}

/* End of file Course.php */
/* Location: ./application/models/Shared/Course.php */