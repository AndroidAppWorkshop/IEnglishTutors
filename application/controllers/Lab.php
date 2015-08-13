<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab extends CI_Controller {

	public function SendEmail()
	{
		$this->load->Render();
	}

	public function ClickSend()
	{
		$this->load->helper( array('file', 'url'));
		$this->load->library('encrypt');

		$jsonString = read_file('./assets/app_data/gmail.smtp.json');	//讀取檔案
		$decrypted = $this->encrypt->decode($jsonString);	//解碼編譯過的JSON檔
		$config = json_decode($decrypted, TRUE);	// TRUE 是轉為陣列格式

		$data_post_name = $this->input->post('YourName', TRUE);
		$data_post_mail = $this->input->post('YourEmail', TRUE);
		$data_post_subject = $this->input->post('YourSubject', TRUE);		
		$data_post_message = $this->input->post('YourMessage', TRUE);

		$this->load->library('email', $config);
		$this->email->from($data_post_mail, $data_post_name);
		$this->email->to('lovero32000@gmail.com');
		$this->email->cc('l7960261@gmail.com');
		$this->email->subject($data_post_subject);
		$this->email->message($data_post_message);

		if ($this->email->send())
		{
			redirect('Lab/SendEmailSuccess');
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}

	public function SendEmailSuccess()
	{
		$this->load->Render();
	}

	public function SMTPSetting()
	{
		$this->load->Render();
	}

	public function SetGmailSMTP()
	{
		$this->load->helper( array('file', 'url'));
		$this->load->library('encrypt');

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
		redirect('Lab/SetGmailSuccess');
	}

	public function SetGmailSuccess()
	{
		$this->load->Render();
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
		        'Username'  => 'johndoe',
		        'Email'     => 'johndoe@some-site.com',
		        'Logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);
	}

	public function GetSessionData()
	{
		$this->load->library('session');
		echo $this->session->userdata('Username');
		echo $this->session->userdata('Email');
		echo $this->session->userdata('Logged_in');
	}

	public function UnsetSessionData()
	{
		$this->load->library('session');
		$this->session->unset_userdata('Username');

		$array_items = array('Email', 'Logged_in');
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

	public function SetCookie()
	{
		$this->load->helper('cookie');

		$config = json_encode(array(
			'Languages' => 'zh-TW'));

		set_cookie('performance', $config, 60*60*24*5);
	}

	public function GetCookie()
	{
		$this->load->helper('cookie');
		echo get_cookie('performance');

		$config = json_decode(get_cookie('performance'));
		echo $config->Languages;

		$config1 = json_decode(get_cookie('performance'), TRUE);
		echo $config1['Languages'];
	}

	public function DeleteCookie()
	{
		$this->load->helper('cookie');
		delete_cookie('performance');
		echo 'cookie is delete!';
	}

	public function Upload_Form()
	{	
		$this->load->helper(array('form','url'));
		$this->load->Render('',array('error' => ' ' ));
	}

	public function DoUpload()
	{
		$this->load->helper(array('form','url'));

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';//php最大到2MB
		$config['max_width']  = '0';// 0 = 不限制寬度
		$config['max_height']  = '0';

		$this->load->library('upload',$config);

		if ( ! $this->upload->do_upload('PhotoFile'))
		{
			$error = array('error' => $this->upload->display_errors());

			// $this->load->view('upload_form',$error);
			echo '上傳失敗';
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			// $this->load->view('upload_success',$data);
			echo '上傳成功';
		}
	}

	public function BootstrapModal()
	{
		$this->load->Render();
	}
}