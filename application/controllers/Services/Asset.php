<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('caches');
		$this->load->helper('file');
	}
	
	public function Refresh()
	{
		$gulp_config_js = fopen('./gulp/gulp.config.js', 'r') or die('Unable to open file!');
		WriteJsonFile('./assets/app_data/gulp.config.json', $this->GulpConfigResolve($gulp_config_js));
		
		$config = LoadJsonFile('./assets/app_data/gulp.config.json');
		print_r($config);
	}
	
	private function GulpConfigResolve(&$file)
	{
		$config = array();
		
		while(!feof($file))
		{
			$line = trim(fgets($file));
			
			if(substr($line, 0, 3) === 'var')
			{
				if($name = $this->GetObjectName($line))
				{
					$this->GetObject($file, $config, $name);
				}
			}
		}
		
		fclose($file);
		return $config;
	}
	
	private function GetObjectName($line)
	{
		$tempArray = array_map('trim', preg_split('/=|:/', $line));
		if(sizeof($tempArray) === 2)
		{
			$object = $tempArray[1];
			if(substr($object, 0, 1) === '{')
			{
				return trim(ltrim($tempArray[0], 'var'));
			}
		}
		
		return FALSE;
	}
	
	private function GetDictionaryKey($line)
	{
		$tempArray = array_map('trim', preg_split('/:/', $line));
		if(sizeof($tempArray) === 2
			&& $tempArray[1] !== '[')
		{
			$key = str_replace('"' , '' , $tempArray[0]);
			return $key;
		}
		
		return FALSE;
	}
	
	private function GetArrayName($line)
	{
		$tempArray = array_map('trim', preg_split('/:/', $line));
		if(sizeof($tempArray) === 2
			&& $tempArray[1] === '[')
		{
			return $tempArray[0];
		}
		
		return FALSE;
	}
	
	private function GetObject(&$file, &$config, $name)
	{
		$config[$name] = array();
		$line = fgets($file);
		
		while($this->NotCloseBrace($line))
		{
			if($innerName = $this->GetObjectName($line))
			{
				$this->GetObject($file, $config[$name], $innerName);
			}
			elseif($key = $this->GetDictionaryKey($line))
			{
				$config[$name][$key] = $this->GetDictionaryValue($line);
			}
			elseif($arrayName = $this->GetArrayName($line))
			{
				$this->GetArray($file, $config[$name], $arrayName);
			}
			
			$line = fgets($file);
		}
		
		$this->caches->Set($name, $config[$name]);
	}
	
	private function GetDictionaryValue($line)
	{
		$value = preg_split('/:/', $line)[1];
		$tempArray = array_map('trim', preg_split('/\+/', $value));
		$tempArray = str_replace(',', '', $tempArray);
		$tempArray = str_replace('__base', '/', $tempArray);
		$tempArray = str_replace('\'', '', $tempArray);
		
		$variableArray = preg_split('/\./', $tempArray[0]);
		
		if(sizeof($variableArray) > 1)
		{
			$variable = $this->caches->Get($variableArray[0]);
			$tempArray[0] = $variable[$variableArray[1]];
		}
		
		return implode('', $tempArray);
	}
	
	private function GetArray(&$file, &$config, $arrayName)
	{
		$config[$arrayName] = array();
		$line = fgets($file);
		
		while($this->NotCloseBracket($line))
		{
			array_push($config[$arrayName], $this->GetArrayValue($line));
			
			$line = fgets($file);
		}
	}
	
	private function GetArrayValue($line)
	{
		$tempArray = array_map('trim', preg_split('/\+/', $line));
		$tempArray = str_replace('\'', '', $tempArray);
		$tempArray = str_replace('paths.bower', '/bower_components/', $tempArray);
		
		return implode('', $tempArray);
	}
	
	private function NotCloseBrace($line)
	{
		$start = trim(preg_split('/=|:/', $line)[0]);
		
		return substr($start, 0, 1) !== '}';
	}
	
	private function NotCloseBracket($line)
	{
		$start = trim(preg_split('/=|:/', $line)[0]);
		
		return substr($start, 0, 1) !== ']';
	}
}

/* End of file Asset.php */
/* Location: ./application/controllers/Services/Asset.php */