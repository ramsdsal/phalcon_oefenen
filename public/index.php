<?php
try
{
	//Create a loader
	$loader = new \Phalcon\Loader();
	$loader->registerDirs([
		'../app/controllers/',
		'../app/models/',
		'../app/views/'
	]);
	$loader->register();

	//Dependency injection
	$di = new \Phalcon\DI\FactoryDefault();
	$di->set('view',function(){
		$view = new \Phalcon\Mvc\View();
		$view->setViewsDir('../app/views/');
		return $view;
	});

	//db config
	$di->set('db', function(){
		return new \Phalcon\Db\Adapter\Pdo\Mysql([
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'phalcon-db',
		]);		
	});	

	//Deploy the app
	$app = new \Phalcon\Mvc\Application($di);
	echo $app->handle()->getContent();
}
catch(\Phalcon\Exception $e)
{
	echo $e->getMessage();
};


?>