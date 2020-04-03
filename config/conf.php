<?php
class Conf{

	static $debug =1;
	static $databases =array(
		'default'=>array(
			'host'=>'localhost',
			'database'=>'forum',
			'login'=>'root',
			'password'=>'password'
		)
	);


}
Router::prefix('cockpit','admin');
Router::connect('/','post/index');
Router::connect('post/:slug-:id','post/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('blog/:action','post/:action');
?>