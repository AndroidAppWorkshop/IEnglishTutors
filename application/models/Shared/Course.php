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
	
	public function Update($id, $title, $start, $end)
	{
		$course = array(
			'Title' => $title,
			'StartAt' => $start,
			'EndAt' => $end
		);
		
		return $this->db->where('Id', $id)
							 ->update('course', $course);
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
	
	public function Get($limit = 100)
	{
		$result = array();
		$query = $this->db->get('course', $limit);
		
		if($query->num_rows() > 0)
		{
			$courses = $query->result_array();
			
			foreach ($courses as $course)
			{
				$course['title'] = $course['Title'];
				$course['type'] = 'info';
				$course['draggable'] = TRUE;
				$course['resizable'] = TRUE;
				$course['files'] = $this->GetFiles($course['Id']);
				
				array_push($result, $course);
			}
		}
		
		return $result;
	}
	
	public function Delete($id)
	{
		$this->db->where('Id', $id)
					->delete('course');
		
		$this->db->where('C_Id', $id)
					->delete('course_files');
	}
	
	private function GetFiles($id)
	{
		return $this->db->where('C_Id', $id)
							->get('course_files')
							->result_array();
	}
}

/* End of file Course.php */
/* Location: ./application/models/Shared/Course.php */