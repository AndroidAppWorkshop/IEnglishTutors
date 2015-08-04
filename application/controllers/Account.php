<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function Index()
	{
		// 返回讀取那個頁面的整個 HTML
		// $string = $this->load->view('System/index', '', TRUE);
		// echo $string;

		// $this->load->database();
		// $query = $this->db->get('language');

		// foreach ($query->result() as $row)
		// {
		//         echo $row->Id;
		// }
		
		$this->load->Render();
	}
}