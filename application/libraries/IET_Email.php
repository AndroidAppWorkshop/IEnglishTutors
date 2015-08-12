<?php
class IET_Email extends CI_Email{
	
	public function __construct(array $config = array())
	{
		parent::__construct($config);

		$this->set_newline("\r\n");
	}
}

/* End of file IET_Email.php */
/* Location: ./application/libraries/IET_Email.php */