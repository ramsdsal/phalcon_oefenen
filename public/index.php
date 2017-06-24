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
	//flash messages
	$di->set('flash', function () {
        return new Phalcon\Flash\Session([
            'error'   => 'alert alert-danger',
            'success' => 'alert alert-success',
            'notice'  => 'alert alert-info',
            'warning' => 'alert alert-warning',
        ]);
    });    

	//Session
    $di->setShared('session', function () {
        $session = new Phalcon\Session\Adapter\Files();
        $session->start();
        return $session;
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