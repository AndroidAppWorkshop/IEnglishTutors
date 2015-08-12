<?php
class IET_Loader extends CI_Loader {

    protected $CI;
	protected $currentController;
	protected $currentFunction;

	public function __construct()
    {
        parent::__construct();
        
        $this->CI = get_instance();
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
        $this->currentController = $this->CI->uri->segment(1, $this->CI->router->default_controller);
        $this->currentFunction = $this->currentController === $this->CI->router->default_controller ? 'Lobby' : $this->CI->uri->segment(2, 'Index');
    }

    protected function GetViewPath($view)
    {
        if(strcmp($view, '') === 0)
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
        
        return $this->CI->Layout->ViewJson($path);
    }
}

/* End of file IET_Loader.php */
/* Location: ./application/core/IET_Loader.php */