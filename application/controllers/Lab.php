<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Shared/Environment');
	}
	
	public function Index()
	{
		$this->load->Render();
	}

	public function ContactUs()
	{
		$this->load->Render();
	}

	public function SendEmail()
	{
		$this->load->helper(array('file', 'url'));
		$this->load->library('email');

		$config = LoadJsonFileWithEncrypt(APPPATH.'app_data/mail.server.json', TRUE);
		$this->email->initialize($config);
		
		$data_post_name = $this->input->post('YourName');
		$data_post_mail = $this->input->post('YourEmail');
		$data_post_subject = $this->input->post('YourSubject');
		$data_post_message = $this->input->post('YourMessage');

		$this->email->from($data_post_mail, $data_post_name);
		$this->email->to('lovero32000@gmail.com');
		$this->email->cc('l7960261@gmail.com');
		$this->email->subject($data_post_subject);
		$this->email->message($data_post_message);

		if ($this->email->send())
		{
			redirect('Lab/Success');
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}

	public function Success()
	{
		$this->load->Render();
	}

	public function MailServerSetting()
	{
		$this->load->Render();
	}

	public function SetMailServer()
	{
		$this->load->helper(array('file', 'url'));
		$this->load->library('email');
		$account = $this->input->post('account');
		$password = $this->input->post('password');
		
		$result = $this->email->SaveMailServer($account, $password);
		
		if($result)
		{
			redirect('Lab/Success');
		}
	}

	public function LoadView()
	{
		// 第三個 可選的 參數，它返回讀取那個頁面的整個 HTML
		$string = $this->load->view('Home/Lobby', '', TRUE);
		echo $string;
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
	
	public function SetTempData()
	{
		$this->load->library('session');
		$this->session->set_tempdata(array(
			'Username'  => 'wilson',
			'Email'     => 'wilson@hotmail.com',
			'Logged' => TRUE
		), NULL, 60*60*2);
	}
	
	public function GetTempData()
	{
		$this->load->library('session');
		print_r($this->User->Get());
	}
	
	public function SetLanguages($language = 'zh-TW')
	{
		$this->User->SetPreference($language);
	}
	
	public function CheckLogin()
	{
		echo $this->User->IsLogin() ? '已登入' : '尚未登入';
	}
	
	public function EncryptSize()
	{
		$this->load->library('encrypt');
		$string1 = '111111';
		$string2 = 'sad451qw23e4';
		$string3 = 'qwoiekldfjowhef';
		echo $string1.' 加密後 : '.$this->encrypt->encode($string1).'<br/>';
		echo '長度為 : '.strlen($this->encrypt->encode($string1)).'<br/>';
		echo $string2.' 加密後 : '.$this->encrypt->encode($string2).'<br/>';
		echo '長度為 : '.strlen($this->encrypt->encode($string2)).'<br/>';
		echo $string3.' 加密後 : '.$this->encrypt->encode($string3).'<br/>';
		echo '長度為 : '.strlen($this->encrypt->encode($string3)).'<br/>';
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
	
	public function Date()
	{	
		$current = strtotime(date('Y-m-d H:i:s'));
		
		echo '上個月最後一天：'.date('Y-m-t H:i:s',strtotime('last month',$current)).'<br/>';
		echo '本月第一天：'.date('Y-m-d H:i:s', mktime(0,0,0,date('n'),1,date('Y'))).'<br/>';
		echo '本月最後一天：'.date('Y-m-d H:i:s', mktime(0,0,0,date('n'),date('t'),date('Y'))).'<br/>';
		echo '下個月第一天：'.date('Y-m-d H:i:s', mktime(0,0,0,date('n')+1,1,date('Y'))).'<br/>';
		echo '下個月最後一天：'.date('Y-m-t H:i:s',strtotime('next month', $current)).'<br/>';
	}
}

/* End of file Lab.php */
/* Location: ./application/controllers/Lab.php */