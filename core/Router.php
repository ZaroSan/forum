<?php
/**
 * 
 */
class Router {

	static $routes=array();


	static function parse($url,$request){
		$url=trim($url,'/');
		$params=explode('/', $url);
		
		$request->controller= $params[0];
		$request->action=isset($params[1]) ? $params[1] : 'index';
		$request->params= array_slice($params, 2);

		return true;

	}
	static function connect($redirection,$url){

	}
	static function url($url){
		return $url;
	}
}
?>