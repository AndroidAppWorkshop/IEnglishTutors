<?php
	class Layout extends CI_Model {

		public function __construct()
		{
                parent::__construct();
        }

        public function ViewJson()
        {
        	$this->db->where('L_Id', 2);
			$this->db->where('Name', 'Home:Lobby');
			$query = $this->db->get('language_usage');

			if ($query->num_rows() > 0)
			{
		        $row = $query->row();
		        return $row->VarName. '='. $row->Content;
			}

			return null;
        }
	}
?>