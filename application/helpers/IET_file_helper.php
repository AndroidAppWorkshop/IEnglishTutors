<?php

function WriteJsonFile($path, $data, $options = 0)
{
	write_file($path, json_encode($data, $options));
}

function WriteJsonFileWithEncrypt($path, $data, $options = 0)
{
	$CI =& get_instance();
	$CI->load->library('encrypt');
	
	write_file($path, $CI->encrypt->encode(json_encode($data, $options)));
}

function LoadJsonFile($path, $assoc = FALSE)
{
	return json_decode(read_file($path), $assoc);
}

function LoadJsonFileWithEncrypt($path, $assoc = FALSE)
{
	$CI =& get_instance();
	$CI->load->library('encrypt');
	
	return json_decode($CI->encrypt->decode(read_file($path)), $assoc);
}

/* End of file IET_file_helper.php */
/* Location: ./application/helpers/IET_file_helper.php */