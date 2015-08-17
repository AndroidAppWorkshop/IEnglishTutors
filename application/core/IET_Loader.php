<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IET_Loader extends CI_Loader {

	protected $CI;

	public function __construct()
	{
		parent::__construct();

		$this->CI =& get_instance();
	}

	public function Render($view = '', $vars = array(), $return = FALSE)
	{
		$path = $this->CI->Router->GetCurrentPath($view);
		
		$this->view('Shared/Header', $this->GetHeaderData());
		$this->view($path, $vars, $return);
		$this->view('Shared/Footer', $this->GetFooterData());
	}

	protected function GetHeaderData()
	{
		$data['MasterCss'] = $this->CI->Layout->MasterCss();
		$data['PlugCss'] = $this->CI->Layout->PlugCss(strtolower($this->CI->Router->GetCurrentPathWithDot()));
		$data['MasterJs'] = $this->CI->Layout->MasterJs();
		
		return $data;
	}
	
	protected function GetFooterData()
	{
		$path = $this->CI->Router->GetCurrentPathWithColon();
		$data['ViewJson'] = $this->CI->Layout->ViewJson($path);
		$data['PlugJs'] = $this->CI->Layout->PlugJs(strtolower($this->CI->Router->GetCurrentPathWithDot()));
		
		return $data;
	}
}

/* End of file IET_Loader.php */
/* Location: ./application/core/IET_Loader.php */