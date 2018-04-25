<?php 

	namespace App;

	/**
	* 
	*/
	class Redirect
	{
		
		private $url;
		private $value;

		function __construct($url)
		{

			if(!empty($url)){

				$this->url 	= strtolower($url);
				$predis 	= new \Predis\Client();
				
				if($this->exists() != 0){
					$this->value = $predis->get("url:".$this->url);
					$this->redirect();
				}

			}

		}	

		function exists()
		{

			$predis = new \Predis\Client();
			$value 	= $predis->exists("url:".$this->url);
			
			if($value == 0)
				return false;
			else
				return true;

		}

		function getUrl()
		{
			return $this->url;
		}

		function redirect()
		{
			header("Location: ".$this->value);
		}

	}