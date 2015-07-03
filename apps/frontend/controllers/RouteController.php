<?php

namespace Multiple\Frontend\Controllers;

class RouteController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
        $routeId = $this->request->get('id')?:null;

        $this->view->disable();
        if ($routeId){

            $route = \Route::findFirst(['id' => $routeId]);

            $points = \Point::find(['id_route' => $routeId, 'order' => 'num']);
            $distances = \Distance::find(['id_route' => $routeId, 'order' => 'xy']);

            $ret = [
                'status' => 200,
                'data'  => [
                    'route' => $route->toArray(),
                    'points' => $points->toArray(),
                    'distances' => $distances->toArray()
                ]
            ];

            echo json_encode($ret);

            exit;

        }

        $ret = [
            'status' => 400
        ];

        echo json_encode($ret);

        exit;

	}

    public function saveAction()
    {

        if ($this->request->isPost()){






        }

        $ret = [
            'status' => 400
        ];

        echo json_encode($ret);

        exit;

    }

}