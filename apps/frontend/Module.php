<?php

namespace Multiple\Frontend;

use Phalcon\DI\FactoryDefault;

class Module
{

	public function registerAutoloaders()
	{

		$loader = new \Phalcon\Loader();

		$loader->registerNamespaces(array(
			'Multiple\Frontend\Controllers' => APP_PATH.'apps/frontend/controllers/',
			'Multiple\Frontend\Models' => APP_PATH.'apps/frontend/models/',
		));

		$loader->register();
	}

	/**
	 * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
	 */
	public function registerServices(FactoryDefault $di)
	{

		//Registering a dispatcher
		$di->set('dispatcher', function () {
			$dispatcher = new \Phalcon\Mvc\Dispatcher();

			//Attach a event listener to the dispatcher
			//$eventManager = new \Phalcon\Events\Manager();
			//$eventManager->attach('dispatch', new \Acl('frontend'));

			//$dispatcher->setEventsManager($eventManager);

			$dispatcher->setDefaultNamespace('Multiple\Frontend\Controllers\\');
			return $dispatcher;
		});

        $di->set('view', function() {

            $view = new \Phalcon\Mvc\View();

            $view->setViewsDir('../apps/frontend/views/');

            $view->registerEngines(array(
                ".volt" => 'voltService'
            ));

            return $view;
        });

	}

}