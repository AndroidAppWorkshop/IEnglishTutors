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
		$this->model('Shared/Layout');
		$path = $this->CI->Router->GetCurrentPath($view);
		
		$this->view('Shared/Header', $this->GetHeaderData());
		$this->view($path, $vars, $return);
		$this->view('Shared/Footer', $this->GetFooterData());
	}

	protected function GetHeaderData()
	{
		$data['MasterCss'] = $this->CI->Layout->MasterCss();
		$data['PlugCss'] = $this->CI->Layout->PlugCss(strtolower($this->CI->Router->GetCurrentPathWithDot()));
		
		return $data;
	}
	
	protected function GetFooterData()
	{
		$path = $this->CI->Router->GetCurrentPathWithColon();
		$language = $this->CI->User->GetLanguage();
		$data['GlobalVariable'] = $this->CI->Layout->GlobalVariable();
		$data['ViewJson'] = $this->CI->Layout->ViewJson($language, $path);
		$data['MasterJs'] = $this->CI->Layout->MasterJs();
		$data['PlugJs'] = $this->CI->Layout->PlugJs(strtolower($this->CI->Router->GetCurrentPathWithDot()));
		
		return $data;
	}
}

/* End of file IET_Loader.php */
/* Location: ./application/core/IET_Loader.php */