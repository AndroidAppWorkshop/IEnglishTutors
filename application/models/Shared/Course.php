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
	
	public function InsertFile($c_id, $path, $name, $type)
	{
		$course_file = array(
			'C_Id' => $c_id,
			'Path' => $path,
			'Name' => $name,
			'Type' => $type
		);
		
		return $this->db->insert('course_files', $course_file);
	}
}

/* End of file Course.php */
/* Location: ./application/models/Shared/Course.php */