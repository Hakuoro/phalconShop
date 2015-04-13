<?php

use Phalcon\Mvc\View;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Config\Adapter\Ini as ConfigIni;

$di = new FactoryDefault();

//$routes = new ConfigIni(APP_PATH . 'common/config/routes.ini');

$router = new \Phalcon\Mvc\Router();
$router->removeExtraSlashes(true);
$router->setDefaultModule("frontend");
$router->setDefaultAction('index');

$adminRout = new \Phalcon\Mvc\Router\Group([
    'module' => 'backend',
]);

$adminRout->setPrefix('/haku');

$adminRout->add('/:controller/:action', [
    'controller' => 1,
    'action' => 2
]);

$adminRout->add('/:controller', [
    'controller' => 1,
    'action' => 'index'
]);

$adminRout->add('', [
    'controller' => 'index',
    'action' => 'index'
]);
// Добавление группы в общие правила маршрутизации
$router->mount($adminRout);


//foreach ($routes as $rout => $paths){
//    $router->add($rout, $paths->toArray());
//}

$di->set('router', $router);

$di->set('url', function() use ($config){
    $url = new UrlProvider();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});

$di->set('voltService', function($view, $di) {

    $volt = new VoltEngine($view, $di);

    $volt->setOptions(array(
        "compiledPath" => APP_PATH . "volt/",
        "compiledExtension" => ".compiled",
        "compileAlways" => true,
        "compiledSeparator" => "_",
    ));

    $compiler = $volt->getCompiler();
    $compiler->addFunction('is_a', 'is_a');

    return $volt;
}, true);

$di->set('db', function() use ($config) {
    $dbclass = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    return new $dbclass(array(
        "host"     => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname"   => $config->database->dbname,
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]
    ));
});

$di->set('session', function() {
    $session = new SessionAdapter();
    $session->start();
    return $session;
});

$di->set('flash', function(){
    return new FlashSession(array(
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
    ));
});
