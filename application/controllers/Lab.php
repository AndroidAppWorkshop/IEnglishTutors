<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab extends CI_Controller {
	
	public function Index()
	{
		$this->load->Render();
	}

	public function SendEmail()
	{
		$this->load->Render();
	}

	public function ClickSend()
	{
		$this->load->helper(array('file', 'url'));
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
		$this->load->helper(array('file', 'url'));
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
		$this->load->Render('', array('error' => ' ' ));
	}

	public function DoUpload()
	{
		$this->load->helper(array('form','url'));

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';//php最大到2MB
		$config['max_width']  = '0';// 0 = 不限制寬度
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('PhotoFile'))
		{
			$error = array('error' => $this->upload->display_errors());
			echo '上傳失敗';
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			echo '上傳成功';
		}
	}

	public function DoDownload()
	{	
		$data_post_URL = $this->input->post('TargetURL', TRUE);
		$headers = get_headers($data_post_URL);//剖析網址
		$pattern = $headers[0]; 
		
		if (preg_match("/200/i", $pattern))//判斷圖片是否存在
		{
			$contentType = strrchr($data_post_URL, '.');//判斷圖片的副檔名
				switch ($contentType){
					case ".jpg":
						$extension= ".jpg";
					break;
					case ".png":
						$extension = ".png";
					break;
					default:
						echo "not match"; exit;
					break;
				}
		}
		 
		$tmpFile="uploads/".md5($data_post_URL).$extension; 

		if (file_put_contents($tmpFile, file_get_contents($data_post_URL)))
		{
			echo '下載成功';
		}
		else
		{
			echo '下載失敗';
		}
	}
	
	public function Asset()
	{
		$this->load->helper('file');
		
		$gulp_config_js = fopen("./gulp/gulp.config.js", "r") or die("Unable to open file!");
		$this->WriteJson('./assets/app_data/gulp.config.json', $this->GulpConfigResolve($gulp_config_js));
		
		$config = $this->LoadJson('./assets/app_data/gulp.config.json');
		print_r($config);
	}
	
	private function GulpConfigResolve(&$file)
	{
		$config = array();
		
		while(!feof($file))
		{
			$line = trim(fgets($file));
			
			if(substr($line, 0, 3) === 'var')
			{
				if($name = $this->GetObjectName($line))
				{
					$this->GetObject($file, $config, $name);
				}
			}
		}
		
		fclose($file);
		return $config;
	}
	
	private function GetObjectName($line)
	{
		$tempArray = array_map('trim', preg_split('/=|:/', $line));
		if(sizeof($tempArray) === 2)
		{
			$object = $tempArray[1];
			if(substr($object, 0, 1) === '{')
			{
				return trim(ltrim($tempArray[0], 'var'));
			}
		}
		
		return FALSE;
	}
	
	private function GetDictionaryKey($line)
	{
		$tempArray = array_map('trim', preg_split('/:/', $line));
		if(sizeof($tempArray) === 2
			&& $tempArray[1] !== '[')
		{
			$key = str_replace('"' , '' , $tempArray[0]);
			return $key;
		}
		
		return FALSE;
	}
	
	private function GetArrayName($line)
	{
		$tempArray = array_map('trim', preg_split('/:/', $line));
		if(sizeof($tempArray) === 2
			&& $tempArray[1] === '[')
		{
			return $tempArray[0];
		}
		
		return FALSE;
	}
	
	private function GetObject(&$file, &$config, $name)
	{
		$config[$name] = array();
		$line = fgets($file);
		
		while($this->NotCloseBrace($line))
		{
			if($innerName = $this->GetObjectName($line))
			{
				$this->GetObject($file, $config[$name], $innerName);
			}
			elseif($key = $this->GetDictionaryKey($line))
			{
				$config[$name][$key] = $this->GetDictionaryValue($line);
			}
			elseif($arrayName = $this->GetArrayName($line))
			{
				$this->GetArray($file, $config[$name], $arrayName);
			}
			
			$line = fgets($file);
		}
	}
	
	private function GetDictionaryValue($line)
	{
		$value = preg_split('/:/', $line)[1];
		$tempArray = array_map('trim', preg_split('/\+/', $value));
		$tempArray = str_replace(',', '', $tempArray);
		$tempArray = str_replace('__base', '/', $tempArray);
		$tempArray = str_replace('\'', '', $tempArray);
		$tempArray = str_replace('paths.bower', '/bower_components/', $tempArray);
		$tempArray = str_replace('paths.assets', '/assets/', $tempArray);
		
		return implode('', $tempArray);
	}
	
	private function GetArray(&$file, &$config, $arrayName)
	{
		$config[$arrayName] = array();
		$line = fgets($file);
		
		while($this->NotCloseBracket($line))
		{
			array_push($config[$arrayName], $this->GetArrayValue($line));
			
			$line = fgets($file);
		}
	}
	
	private function GetArrayValue($line)
	{
		$tempArray = array_map('trim', preg_split('/\+/', $line));
		$tempArray = str_replace('\'', '', $tempArray);
		$tempArray = str_replace('paths.bower', '/bower_components/', $tempArray);
		
		return implode('', $tempArray);
	}
	
	private function NotCloseBrace($line)
	{
		$start = trim(preg_split('/=|:/', $line)[0]);
		
		return substr($start, 0, 1) !== '}';
	}
	
	private function NotCloseBracket($line)
	{
		$start = trim(preg_split('/=|:/', $line)[0]);
		
		return substr($start, 0, 1) !== ']';
	}
	
	private function WriteJson($path, $data)
	{
		write_file($path, json_encode($data));
	}
	
	private function LoadJson($path, $assoc = FALSE)
	{
		return json_decode(read_file($path), $assoc);
	}
}

/* End of file Lab.php */
/* Location: ./application/controllers/Lab.php */
