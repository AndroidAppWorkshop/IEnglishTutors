<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caches {
		
	protected $CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	public function Set($key, $value, $second = 300)
	{
		$this->CI->cache->file->save($key, $value, $second);
	}
	
	public function Get($key)
	{
		return $this->CI->cache->file->get($key);
	}
}

/* End of file Cache.php */
/* Location: ./application/libraries/Cache.php */