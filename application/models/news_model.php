<?php
//news_model.php


class News_model extends CI_Model
{
	public function __construct()
	{//creates an active connecion to db
		//$this->load->database();
	}

	public function get_news($request)
	{
  		$response = file_get_contents($request);
  		return simplexml_load_string($response);
	}	
}

?>