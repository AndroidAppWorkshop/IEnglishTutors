<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IET_Loader extends CI_Loader {

	protected $CI;

	public function __construct()
	{
		parent::__construct();

		$this->CI =& get_instance();
		$this->model('Shared/Router');
	}

	public function Render($view = '', $vars = array(), $return = FALSE)
	{
		$path = $this->CI->Router->GetCurrentPath($view);

		$this->view('Shared/Header', $this->GetHeaderData());
		$this->view($path, $vars, $return);
		$this->view('Shared/Footer');
	}

	protected function GetHeaderData()
	{
		$path = $this->CI->Router->GetCurrentPathWithColon();
		$viewJson = $this->CI->Layout->ViewJson($path);

		$data['ViewJson'] = $viewJson;
		return $data;
	}
}

/* End of file IET_Loader.php */
/* Location: ./application/core/IET_Loader.php */