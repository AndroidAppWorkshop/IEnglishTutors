<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function Index()
	{
		$this->load->Render('Home/Index');
	}
}