<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_course() {
		
		$query = $this->db->select('Id,Title,Date')
				 ->from('course')
				 ->get();
		return $query;
	}
	
	public function get_courseFiles() {
		
		$query = $this->db->select('*')
				 ->from('course_files')
				 ->get();
		return $query;
	}
	
	public function pass_to_js_side($course_files)
	{
		echo json_encode($course_files);
		return $course_files;
	}
}

/* End of file Lab_model.php */
/* Location: ./application/models/Lab/Lab_model.php */