<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IET_Loader extends CI_Loader {

	protected $CI;
	protected $GlobalKey;

	public function __construct()
	{
		parent::__construct();

		$this->CI =& get_instance();
	}

	public function Render($view = '', $vars = array(), $return = FALSE)
	{
		$this->GlobalKey = $this->SetGlobalKey();
		$this->model('Shared/Layout');
		$path = $this->CI->Router->GetCurrentPath($view);
		
		$this->view('Shared/Header', $this->GetHeaderData());
		$this->view('Shared/AnalyticsTracking');
		$this->view($path, $vars, $return);
		$this->view('Shared/Footer', $this->GetFooterData());
	}

	protected function GetHeaderData()
	{
		$data['MasterCss'] = $this->CI->Layout->MasterCss($this->GlobalKey);
		$data['PlugCss'] = $this->CI->Layout->PlugCss(strtolower($this->CI->Router->GetCurrentPathWithDot()));
		$data['Meta'] = $this->CI->Layout->Meta();
		$data['BodyStart'] = $this->CI->Layout->BodyStart(strtolower($this->CI->Router->GetCurrentController()));
		
		return $data;
	}
	
	protected function GetFooterData()
	{
		$path = $this->CI->Router->GetCurrentPathWithColon();
		$language = $this->CI->User->CurrentLanguage();
		$data['GlobalVariable'] = $this->CI->Layout->GlobalVariable();
		$data['ViewJson'] = $this->CI->Layout->ViewJson($language, $path);
		$data['Preference'] = $this->CI->Layout->PreferenceJson();
		$data['MasterJs'] = $this->CI->Layout->MasterJs($this->GlobalKey);
		$data['PlugJs'] = $this->CI->Layout->PlugJs(strtolower($this->CI->Router->GetCurrentPathWithDot()));
		$data['GoogleMap'] = $this->CI->Layout->GoogleMap(strtolower($this->CI->Router->GetCurrentController()));
		
		return $data;
	}
	
	protected function SetGlobalKey()
	{
		$key = 'global';
		$controller = strtolower($this->CI->Router->GetCurrentController());
		
		if($controller === 'webportal')
		{
			$key = $controller.'.'.$key;
		}
		
		return $key;
	}
}

/* End of file IET_Loader.php */
/* Location: ./application/core/IET_Loader.php */