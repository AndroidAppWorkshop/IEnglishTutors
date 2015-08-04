<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab extends CI_Controller {

	public function Index()
	{
		$data_post_name = $this->input->post('YourName', TRUE);
		$data_post_mail = $this->input->post('YourMail', TRUE);
		$data_post_subject = $this->input->post('YourSubject', TRUE);		
		$data_post_message = $this->input->post('YourMessage', TRUE);
		$this->load->Render();
	}

	public function clickSend(){

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => '465',
			'smtp_user' => 'l7960261@gmail.com',//當作客服的信箱
			'smtp_pass' => ''
		);

		$this->load->library('email' , $config );
		$this->email->set_newline("\r\n");	

		$this->email->from('lovero32000@gmail.com', 'Hua Lu');//寄件者姓名
		$this->email->to('l7960261@gmail.com');			  //要寄給誰
		$this->email->subject('this is an email subject');    //信件標題
		$this->email->message('this is the mail content');    //信件內容

		if ($this->email->send()) {
			echo 'your email was sent';
		}
		else{
			show_error($this->email->print_debugger());
		}
	}
}