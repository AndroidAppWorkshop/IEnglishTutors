<?php
class IET_Loader extends CI_Loader {

	protected $uriController;
	protected $uriFunction;

	public function __construct()
    {
        parent::__construct();
    }

    public function Render($view, $vars = array(), $return = FALSE){
        $this->GetURIPath();
    	$headerModel['Title'] = $this->uriController.' - '.$this->uriFunction;
    	
    	$this->view('Shared/Header', $headerModel);
    	$this->view($view, $vars, $return);
    	$this->view('Shared/Footer');
    }

    protected function GetURIPath(){
        $CI =& get_instance();
        $this->uriController = $CI->uri->segment(1, $CI->router->default_controller);
        $this->uriFunction = $CI->uri->segment(2, 'Index');
    }
}