<?php
class IET_Loader extends CI_Loader {

	protected $uriController;
	protected $uriFunction;

	public function __construct()
    {
        parent::__construct();
    }

    public function render($view, $vars = array(), $return = FALSE){
    	$this->getURIPath();
    	$headerModel['Title'] = $this->uriController.' - '.$this->uriFunction;
    	
    	$this->view('Shared/Header', $headerModel);
    	$this->view($view, $vars, $return);
    	$this->view('Shared/Footer');
    }

    protected function getURIPath(){
    	$CI =& get_instance();
    	$this->uriController = $CI->uri->segment(1);
    	$this->uriFunction = $CI->uri->segment(2) === FALSE ? $CI->uri->segment(2) : 'Index' ;
    }
}