<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends CI_Model {
	
	protected $Config;
	protected $Setting;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('caches');
		$this->load->helper(array('file', 'url'));
		$this->load->model(array('Shared/Environment', 'Shared/Languages'));
		$this->Initialize();
	}
	
	public function GlobalVariable()
	{
		$result = $this->GenerateScriptVariable('$base_url', base_url(), TRUE);
		$result = $result.$this->GenerateScriptVariable('$IsDev', $this->Environment->IsDevelopment());
		$result = $result.$this->GenerateScriptVariable('$CurrentLang', $this->User->CurrentLanguage(), TRUE);
		return $result;
	}
	
	public function ViewJson($language, $currentPath = '')
	{
		$this->db->select('VarName, Content');
		$this->db->from('language_usage');
		$this->db->join('language', 'language.Id = language_usage.L_Id');
		$this->db->where('language.Name', $language);
		$this->db->where('language_usage.Name', $currentPath);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return 'var '.$row->VarName.' = '.$row->Content.';';
		}

		return null;
	}
	
	public function PreferenceJson()
	{
		$languages = json_encode($this->Languages->GetAll(TRUE));
		
		return 'var Preference = { langs: '.$languages.'};';
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
		if($this->caches->Get('gulp_config')
			&& $this->caches->Get('bundle_setting'))
		{
			$this->Config = $this->caches->Get('gulp_config');
			$this->Setting = $this->caches->Get('bundle_setting');
		}
		else
		{
			$config = LoadJsonFile(APPPATH.'app_data/gulp.config.json')->config;
			$setting = LoadJsonFile(APPPATH.'app_data/bundle.setting.json')->setting;
			$this->caches->Set('gulp_config', $config, 60*60*24*7);
			$this->caches->Set('bundle_setting', $setting, 60*60*24*7);
			$this->Config = $config;
			$this->Setting = $setting;
		}
	}
	
	private function HtmlString($path, $type, $format)
	{
		$result = array();
		
		if($this->Environment->IsDevelopment())
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
	
	private function GenerateScriptVariable($key, $value, $quote = FALSE)
	{
		if($quote)
		{
			return 'var '.$key.' = "'.$value.'";';
		}
		else
		{
			if($value === TRUE)
			{
				$value = 1;
			}
			else if($value === FALSE)
			{
				$value = 0;	
			}
			
			return 'var '.$key.' = '.$value.';';
		}
	}
}

/* End of file Layout.php */
/* Location: ./application/models/Shared/Layout.php */