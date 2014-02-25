<?php

/*namespace Application;

class Request {
	
	private $uri;
	private $args = array();
	
	public function __construct() {
		$scriptName = $_SERVER['SCRIPT_NAME'];
		$uri = $_SERVER['REQUEST_URI'];
		$args = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';
		
		if(strpos($uri, $scriptName) !== false) {
			$path = $scriptName;
		}	else {
			$path = str_replace('\\', '', dirname($scriptName));
		}
		
		$uri = substr_replace($uri, '', 0, strlen($path));
		$uri = str_replace('?' . $args, '', $uri);
		$uri = '/' . ltrim($uri, '/');
		
		$this->uri = $uri;
		$this->args = $args;
	}
	
	public function getUri() {
		return $this->uri;
	}
	
	public function getArgs() {
		return $this->args;
	}
}*/