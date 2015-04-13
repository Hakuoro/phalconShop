<?php

error_reporting(E_ALL);

define('APP_PATH', realpath('..') . '/');

use Phalcon\Config\Adapter\Ini as ConfigIni;


try {
    $config = new ConfigIni(APP_PATH . 'common/config/config.ini');

    $registerDirs = $config->registerDirs->toArray();

    array_walk($registerDirs, function (&$item){
        $item = APP_PATH.$item;
    });

    (new \Phalcon\Loader())->registerDirs($registerDirs)->register();

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
    print_r($e->getTrace());
}

