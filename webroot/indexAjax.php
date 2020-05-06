<?php
define('WEBROOT',dirname(__FILE__));
define('ROOT',dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));

require CORE.DS.'Includes.php';

$request=new Request();
$name=ucfirst($request->controller).'Controller';
$file= ROOT.DS.'controller'.DS.$name.'.php';
if (file_exists($file)) {
	require_once($file);
	$controller= new $name($request);
	call_user_func_array(array($controller,$request->action), array());
}	
?>