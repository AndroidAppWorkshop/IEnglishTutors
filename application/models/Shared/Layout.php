<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('GoogleMapApiKey', 'AIzaSyAjuWsRrCrWkHBKUVBmXu4OqDO0cu2RV34');

class Layout extends CI_Model {
	
	protected $Config;
	protected $Setting;
	protected $Key;
	protected $Meta;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('caches');
		$this->load->helper(array('file', 'url'));
		$this->load->model(array('Shared/Environment', 'Shared/Languages', 'Shared/Metadata'));
		$this->Initialize();
	}
	
	public function GlobalVariable()
	{
		$result = $this->GenerateScriptVariable('$base_url', base_url(), TRUE);
		$result = $result.$this->GenerateScriptVariable('$IsDev', $this->Environment->IsDevelopment());
		$result = $result.$this->GenerateScriptVariable('$CurrentLang', $this->User->CurrentLanguage(), TRUE);
		return $result;
	}
	
	public function Meta()
	{
		if($this->caches->Get('metadata'))
		{
			$this->Meta = $this->caches->Get('metadata');
		}
		else
		{
			$this->Meta = $this->Metadata->Build();
			$this->caches->Set('metadata', $this->Meta, 60*60*24*7);
		}
		
		return $this->Meta;
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
	
	public function MasterCss($key)
	{
		return $this->HtmlString($key, 'style', '<link href="%s" rel="stylesheet">');
	}
	
	public function MasterJs($key)
	{
		return $this->HtmlString($key, 'script', '<script src="%s"></script>');
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
			$this->Key = $this->caches->Get('key');
		}
		else
		{
			$config = LoadJsonFile(APPPATH.'app_data/gulp.config.json')->config;
			$setting = LoadJsonFile(APPPATH.'app_data/bundle.setting.json')->setting;
			$key = LoadJsonFile(APPPATH.'app_data/bundle.setting.json')->key;
			$this->caches->Set('gulp_config', $config, 60*60*24*7);
			$this->caches->Set('bundle_setting', $setting, 60*60*24*7);
			$this->caches->Set('key', $key, 60*60*24*7);
			$this->Config = $config;
			$this->Setting = $setting;
			$this->Key = $key;
		}
	}
	
	public function BodyStart($controller)
	{
		if($controller === 'webportal')
		{
			return '<body>';
		}
		else
		{
			return '<body data-spy="scroll" data-target="#navigation">';
		}
	}
	
	public function GoogleMap($controller)
	{
		if($controller === 'webportal')
		{
			return NULL;
		}
		else
		{
			return '<script async defer src="https://maps.googleapis.com/maps/api/js?key='.GoogleMapApiKey.'&callback=initMap"></script>';
		}
	}
	
	private function HtmlString($path, $type, $format)
	{
		$key = $this->Key;
		$result = array();
		
		if($this->Environment->IsDevelopment())
		{
			if(array_key_exists($path, $this->Setting)
				&& array_key_exists($type, $this->Setting->$path))
			{
				foreach($this->Setting->$path->$type as $value)
				{
					array_push($result, sprintf($format, $value.$key));
				}
			}
		}
		else
		{
			$type = $type === 'script' ? 'js' : 'css';
			
			if(array_key_exists($path, $this->Setting))
			{
				$value = $this->Config->$type.$path.'.'.$type;
				array_push($result, sprintf($format, $value.$key));
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