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

		$jsonString = read_file('./assets/app_data/gmail.smtp.json');	//讀取檔案

		$decrypted = $this->encrypt->decode($jsonString);	//解碼編譯過的JSON檔

		$config = json_decode($decrypted, TRUE);	// TRUE 是轉為陣列格式

		$this->load->library('email', $config);
		$this->email->from('lovero32000@gmail.com', 'Hua Lu');
		$this->email->to('lovero32000@gmail.com');
		$this->email->cc('l7960261@gmail.com');
		$this->email->subject('this is an email subject');
		$this->email->message('this is the mail content');

		if ($this->email->send())
		{
			echo 'your email was sent';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}

	public function SetGmail()
	{
		$this->load->helper('file');
		$this->load->library('encrypt');
		$this->load->Render();

		$account = $this->input->post('GmailAccount');
		$password = $this->input->post('GmailPassword');

		$config = array(
			'protocol' => 'smtp' ,
			'smtp_host'=> 'ssl://smtp.googlemail.com',
			'smtp_port'=> '465',
			'smtp_user'=> $account,
			'smtp_pass'=> $password
		);

		$jsonString = json_encode($config);
		$encrypted = $this->encrypt->encode($jsonString);

		write_file('./assets/app_data/gmail.smtp.json', $encrypted);
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

	public function SetSessionData()
	{
		$this->load->library('session');

		$newdata = array(
		        'username'  => 'johndoe',
		        'email'     => 'johndoe@some-site.com',
		        'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);
	}

	public function GetSessionData()
	{
		$this->load->library('session');
		echo $this->session->userdata('username');
		echo $this->session->userdata('email');
		echo $this->session->userdata('logged_in');
	}

	public function UnsetSessionData()
	{
		$this->load->library('session');
		$this->session->unset_userdata('username');

		$array_items = array('email', 'logged_in');
		$this->session->unset_userdata($array_items);
	}

	public function DestroySession()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
	}

	public function Languages()
	{
		$this->load->library('user_agent');
		print_r($this->agent->languages());
	}
}