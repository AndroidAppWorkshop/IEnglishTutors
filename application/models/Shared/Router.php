<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Router extends CI_Model {

	protected $currentController;
	protected $currentFunction;

	public function __construct()
	{
		parent::__construct();

		$this->SetCurrentPath();
	}

	public function GetCurrentController()
	{
		return $this->currentController;
	}

	public function GetCurrentFunction()
	{
		return $this->currentFunction;
	}

	public function GetCurrentPath($view = '')
	{
		if(strcasecmp($view, '') === 0)
		{
			return $this->currentController.'/'.$this->currentFunction;
		}

		return $view;
	}

	public function GetCurrentPathWithColon()
	{
		return $this->currentController.':'.$this->currentFunction;
	}
	
	public function GetCurrentPathWithDot()
	{
		return $this->currentController.'.'.$this->currentFunction;
	}

	protected function SetCurrentPath()
	{
		$this->currentController = $this->uri->segment(1, $this->router->default_controller);
		$this->currentFunction = $this->currentController === $this->router->default_controller ? 'Lobby' : $this->uri->segment(2, 'Index');
	}
}

/* End of file Router.php */
/* Location: ./application/models/Shared/Router.php */