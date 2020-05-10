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
	static $admin='cockpit';

}
Router::prefix(Conf::$admin,'admin');
Router::connect('/','post/index');
Router::connect('post/:slug-:id','post/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('gender/:name-:id','genre/view/id:([0-9]+)/name:([a-z0-9\-]+)');
Router::connect('page/:slug-:id','page/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('manga/:slug-:id','manga/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('blog/:action','post/:action');
?>