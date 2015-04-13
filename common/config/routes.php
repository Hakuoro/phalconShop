<?php

$router = new \Phalcon\Mvc\Router();

$router->removeExtraSlashes(true);

/**
 * Frontend routes
 */
//$router->setDefaultModule("frontend");

$router->add('/:controller/:action', array(
    'module' => 'frontend',
    'controller' => 1,
    'action' => 2,
));

$router->add("/login", array(
    'module' => 'backend',
    'controller' => 'login',
    'action' => 'index',
));

$router->add("/admin/products/:action", array(
    'module' => 'backend',
    'controller' => 'products',
    'action' => 1,
));

$router->add("/products/:action", array(
    'module' => 'frontend',
    'controller' => 'products',
    'action' => 1,
));

/**
 * Backend routes
 */

return $router;