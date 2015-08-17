<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends CI_Model {
	
	protected $CI;
	protected $Config;
	protected $Setting;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->CI =& get_instance();
		$this->CI->load->helper('file');
		$this->CI->load->model('Shared/Environment');
		$this->Initialize();
	}

	public function ViewJson($currentPath = '')
	{
		$this->db->select('VarName, Content');
		$this->db->from('language_usage');
		$this->db->join('language', 'language.Id = language_usage.L_Id');
		$this->db->where('language.Name', 'zh-TW');
		$this->db->where('language_usage.Name', $currentPath);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->VarName.'='.$row->Content;
		}

		return null;
	}
	
	public function MasterCss()
	{
		return $this->HtmlString('global', 'style', '<link href="%s" rel="stylesheet">');
		
	}
	
	public function MasterJs()
	{
		return $this->HtmlString('global', 'script', '<script src="%s"></script>');
	}
	
	public function PlugCss($key)
	{
		return $this->HtmlString($key, 'style', '<link href="%s" rel="stylesheet">');
	}
	
	public function PlugJs($key)
	{
		return $this->HtmlString($key, 'script', '<script src="%s"></script>');
	}
	
	private function Initialize()
	{
		$this->Config = LoadJsonFile('./assets/app_data/gulp.config.json')->config;
		$this->Setting = LoadJsonFile('./assets/app_data/bundle.setting.json')->setting;
	}
	
	private function HtmlString($path, $type, $format)
	{
		$result = array();
		
		if($this->CI->Environment->IsDevelopment())
		{
			if(array_key_exists($path, $this->Setting)
				&& array_key_exists($type, $this->Setting->$path))
			{
				foreach($this->Setting->$path->$type as $value)
				{
					array_push($result, sprintf($format, $value));
				}
			}
		}
		else
		{
			$type = $type === 'script' ? 'js' : 'css';
			
			if(array_key_exists($path, $this->Setting))
			{
				$value = $this->Config->$type.$path.'.'.$type;
				array_push($result, sprintf($format, $value));
			}
		}
		
		return implode('', $result);
	}
}

/* End of file Layout.php */
/* Location: ./application/models/Shared/Layout.php */