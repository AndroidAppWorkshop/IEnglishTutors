<?php
class IET_Loader extends CI_Loader {

	protected $currentController;
	protected $currentFunction;

	public function __construct()
    {
        parent::__construct();
    }

    public function Render($view = '', $vars = array(), $return = FALSE)
    {
        $this->SetCurrentPath();
        $viewPath = $this->GetViewPath($view);

    	$this->view('Shared/Header', $this->GetHeaderData());
    	$this->view($viewPath, $vars, $return);
    	$this->view('Shared/Footer');
    }

    protected function SetCurrentPath()
    {
        $CI =& get_instance();
        $this->currentController = $CI->uri->segment(1, $CI->router->default_controller);
        $this->currentFunction = $this->currentController === $CI->router->default_controller ? 'Lobby' : $CI->uri->segment(2, 'Index');
    }

    protected function GetViewPath($view)
    {
        if(strcmp($view, '') == 0)
        {
            return $this->currentController.'/'.$this->currentFunction;
        }

        return $view;
    }

    protected function GetHeaderData()
    {
        $data['ViewJson'] = $this->GetViewJson();
        return $data;
    }

    protected function GetViewJson()
    {
        $path = $this->currentController.':'.$this->currentFunction;
        
        $CI =& get_instance();
        return $CI->Layout->ViewJson($path);
    }
}