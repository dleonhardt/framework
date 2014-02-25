<?php

/*namespace Application;

class Router {
	
	private $routes = array();
	private $rex_routes = array();
	
	private $current_route = null;
	
	public function param($name) {
		if(isset($this->current_route[$name])) {
			$this->current_route[$name];
		}
	}
	
	public function add($path, $class) {
		$this->routes[$path] = $class;
		
		if(preg_match_all('#<(.*)>#U', $path, $matches)) {
		 $params = $matches[1];
		 $rex_route = preg_replace('#<(.*)>#U', '(.*)', $path);
		 $this->rex_routes['#'.$rex_route.'#'] = $params;
		}
		
		$this->routes[$path] = $class;
	}
	
	public function match($uri) {
		if(array_key_exists($uri, $this->routes)) {
			return $this->routes[$uri];
		} else {
			foreach($this->rex_routes as $route => $params) {
				if(preg_match($route, $uri, $matches)) {
					array_shift($matches);
					$this->current_route = array_combine($params, $matches);
					
					return true;
				}
			}
		}
	}
	
	public function dispatch(Request $request) {
		$route = $this->match($request->getUri());
		if($route) {
			list($className, $method) = explode('::', $route, 2);
			$class = new $className;
		
			if(method_exists($class, $method)) {      
				return $class->{$method}($request);
			}
		}
		
		return "Error route not found!";
	}
	
}*/