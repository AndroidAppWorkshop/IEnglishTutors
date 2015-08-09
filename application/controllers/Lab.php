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
		$this->load->library('encrypt');

		$jsonString = read_file('./assets/app_data/email_account.json');//讀取檔案

		$decrypted = $this->encrypt->decode($jsonString);//解碼編譯過的JSON檔

		$config = json_decode($decrypted,true);//true 是轉為陣列格式

		$this->load->library('email' , $config );
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

	public function testSession()
	{
		$this->load->library('session');
		print_r($this->session->all_userdata());

		echo "<br>";

		$this->load->library('user_agent');
		print_r($this->agent->languages());

	}

	public function LoadView()
	{
		// 第三個 可選的 參數，它返回讀取那個頁面的整個 HTML
		$string = $this->load->view('Home/Lobby', '', TRUE);
		echo $string;
	}

	public function LoadModel()
	{
		$this->load->model('Shared/Layout');
		echo $this->Layout->ViewJson();
	}
}