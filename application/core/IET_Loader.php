<?php
class IET_Loader extends CI_Loader {

	protected $currentController;
	protected $currentFunction;

	public function __construct()
    {
        parent::__construct();
    }

    public function Render($view, $vars = array(), $return = FALSE){
        $this->GetCurrentPath();
    	$headerModel['Title'] = $this->currentController.' - '.$this->currentFunction;
    	
    	$this->view('Shared/Header', $headerModel);
    	$this->view($view, $vars, $return);
    	$this->view('Shared/Footer');
    }

    protected function GetCurrentPath(){
        $CI =& get_instance();
        $this->currentController = $CI->uri->segment(1, $CI->router->default_controller);
        $this->currentFunction = $this->currentController === $CI->router->default_controller ? 'Lobby' : $CI->uri->segment(2, 'Index');
    }
}