<?php
//echo Phalcon\Version::get(); exit;
error_reporting(E_ALL);

define('APP_PATH', realpath('..') . '/');

use Phalcon\Config\Adapter\Ini as ConfigIni;


try {
    require APP_PATH . 'common/config/services.php';

    $application = new \Phalcon\Mvc\Application($di);

    $application->registerModules(require APP_PATH.'common/config/modules.php');


    //print_r($_REQUEST); exit;

    /** @var \Phalcon\Mvc\Router $router */
    //$router = $di->getRouter();

    //$router->handle();
    //var_dump($router->getMatchedRoute()); exit;
    echo $application->handle()->getContent();
} catch (Exception $e){
    echo $e->getMessage();
    //print_r($e->getTrace());
}

