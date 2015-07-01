<?php

namespace Multiple\Frontend\Controllers;

class RouteController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
        $routeId = $this->request->get('id')?:null;

        $this->view->disable();
        if ($routeId){

            $this->view->route = \Route::findFirst(['id' => $routeId]);

            $this->view->points = \Point::find(['id_route' => $routeId, 'order' => 'num']);
            $this->view->distances = \Distance::find(['id_route' => $routeId, 'order' => 'xy']);

        }

	}
}