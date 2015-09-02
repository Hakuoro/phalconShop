<?php

use Phalcon\Mvc\View;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\Mvc\Model\Manager as ModelsManager;


$config = new ConfigIni(APP_PATH . 'common/config/config.ini');

$registerDirs = $config->registerDirs->toArray();

array_walk($registerDirs, function (&$item){
    $item = APP_PATH.$item;
});
$loader = new \Phalcon\Loader();
$loader->registerDirs($registerDirs)->register();

$loader->registerNamespaces(array(
    'Common\Models' => APP_PATH.'common/models/',
));

$di = new FactoryDefault();

$di->set('config', $config);

$router = new \Phalcon\Mvc\Router();
$router->removeExtraSlashes(true);
$router->setDefaultModule("frontend");
$router->setDefaultAction('index');

$adminRout = new \Phalcon\Mvc\Router\Group([
    'module' => 'backend',
]);

$adminRout->setPrefix('/haku');

$adminRout->add('/:controller/:action/:int', [
    'controller' => 1,
    'action' => 2,
    'id' => 3
]);

$adminRout->add('/:controller/:action', [
    'controller' => 1,
    'action' => 2
]);

$adminRout->add('/:controller', [
    'controller' => 1,
    'action' => 'list'
]);

$adminRout->add('/:controller/new', [
    'controller' => 1,
    'action' => 'edit'
]);

$adminRout->add('/:controller/:int', [
    'controller' => 1,
    'action' => 'edit',
    'id' => 2
]);

$adminRout->add('', [
    'controller' => 'index',
    'action' => 'index'
]);
// Добавление группы в общие правила маршрутизации
$router->mount($adminRout);

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
    //$compiler->addFunction('is_a', 'is_a');


    $compiler->addFilter('fund_round', function ($resolvedArgs, $exprArgs) {

        return 'round(' . $resolvedArgs . ', 2)';
    });



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

$di->set('modelsManager', function() {
    return new ModelsManager();
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
