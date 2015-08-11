<?php
class IET_Email extends CI_Email{
	
	public function __construct(array $config = array())
	{
		parent::__construct($config);

		$this->set_newline("\r\n");
	}
}
?>