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

	//Deploy the app
	$app = new \Phalcon\Mvc\Application($di);
	echo $app->handle()->getContent();
}
catch(\Phalcon\Exception $e)
{
	echo $e->getMessage();
};


?>