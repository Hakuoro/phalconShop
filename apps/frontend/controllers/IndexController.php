<?php

namespace Multiple\Frontend\Controllers;

class IndexController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{

        $this->view->user = \User::findFirst(['id' => 1]);

        $this->view->routes = \Route::find(['id_route' => $this->view->user->id]);

	}

    public function routeAction()
    {

        print_r($this->request->get('id'));
        exit;

    }
}