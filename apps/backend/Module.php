<?php

namespace Multiple\Backend;

use Multiple\Backend\Plugins\AclListener;
use Multiple\Backend\Plugins\BackendAssets;
use Phalcon\DI\FactoryDefault;

class Module
{

	public function registerAutoloaders()
	{

		$loader = new \Phalcon\Loader();

		$loader->registerNamespaces(array(
			'Multiple\Backend\Controllers' => APP_PATH.'apps/backend/controllers/',
			'Multiple\Backend\Models' => APP_PATH.'apps/backend/models/',
			'Multiple\Backend\Plugins' => APP_PATH.'apps/backend/plugins/',
			'Multiple\Backend\Forms' => APP_PATH.'apps/backend/forms/',
		));

		$loader->register();
	}

	/**
	 * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
	 */
	public function registerServices(FactoryDefault $di)
	{

		//Registering a dispatcher
		$di->set('dispatcher', function() {

			$dispatcher = new \Phalcon\Mvc\Dispatcher();

			//Attach a event listener to the dispatcher
			$eventManager = new \Phalcon\Events\Manager();
			//$eventManager->attach('dispatch', new AclListener('backend'));
			$eventManager->attach('dispatch', new BackendAssets('backend'));


			$dispatcher->setEventsManager($eventManager);
			$dispatcher->setDefaultNamespace('Multiple\Backend\Controllers\\');
			return $dispatcher;
		});

		//Registering the view component
		$di->set('view', function() {
			$view = new \Phalcon\Mvc\View();
			$view->setViewsDir(APP_PATH.'apps/backend/views/');

            $view->registerEngines(array(
                ".volt" => 'voltService'
            ));

			return $view;
		});
	}

}