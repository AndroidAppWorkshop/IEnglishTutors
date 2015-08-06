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

	public function ClickSend()
	{
		$this->load->helper('file');
		$jsonString = read_file('./assets/json/email_account.json');
		$config = json_decode($jsonString,true);//true 是轉為陣列格式

		$this->load->library('email' , $config );
		$this->email->set_newline("\r\n");	

		$this->email->from('lovero32000@gmail.com', 'Hua Lu');//寄件者姓名
		$this->email->to('lovero32000@gmail.com');			  //要寄給誰
		$this->email->subject('this is an email subject');    //信件標題
		$this->email->message('this is the mail content');    //信件內容

		if ($this->email->send())
		{
			echo 'your email was sent';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}

	public function LoadView()
	{
		// 第三個 可選的 參數，它返回讀取那個頁面的整個 HTML
		$string = $this->load->view('Home/Lobby', '', TRUE);
		echo $string;
	}

	public function LoadModel()
	{
		// 已設定 autoload.php 全域自動加載 'Shared/Layout'
		// $this->load->model('Shared/Layout');
		echo $this->Layout->ViewJson('Home:Lobby');
	}
}