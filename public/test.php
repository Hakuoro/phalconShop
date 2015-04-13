<?php
define('APP_PATH', realpath('..') . '/');

use Phalcon\Config\Adapter\Ini as ConfigIni;

// Маршруты для проверки
$testRoutes = array(
    '/',
    '/login',
);


// Тут необходимо установить правила маршрутизации
//...

$routes = new ConfigIni(APP_PATH . 'common/config/routes.ini');

$router = new \Phalcon\Mvc\Router();
//$router->removeExtraSlashes(true);

$router->setDI(new Phalcon\DI\FactoryDefault());
//$router->setDefaultModule("frontend");

foreach ($routes as $rout => $paths){
    $router->add($rout, $paths->toArray());
}

// Цикл проверки маршрутов
foreach ($testRoutes as $testRoute) {

    // Обработка маршрута
    $router->handle($testRoute);

    echo 'Тестирование ', $testRoute, '<br>';

    // Проверка выбранного маршрута
    if ($router->wasMatched()) {
        echo 'Модуль (Module): ', $router->getModuleName(), '<br>';
        echo 'Контроллер (Controller): ', $router->getControllerName(), '<br>';
        echo 'Действие (Action): ', $router->getActionName(), '<br>';
    } else {
        echo 'Маршрут не поддерживается<br>';
    }
    echo '<br>';

}