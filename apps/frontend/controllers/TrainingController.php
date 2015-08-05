<?php

namespace Multiple\Frontend\Controllers;

class TrainingController extends BaseController
{

	public function addAction()
	{

        if ($this->request->isPost() && $this->request->isAjax()){

            $routeId = $this->request->get('id')?:null;
            $distance = $this->request->get('distance')?:null;

            if (!$routeId || !$distance){
                $this->out(['status' => 401]);
            }

            $route = \Route::findFirst($routeId);

            if (!$route){
                $this->out(['status' => 402]);
            }

            $training = new \Training();
            $training->id_route = $route->id;
            $training->distance = (int) $distance;

            if(!$training->save()){

                print_r($training->getMessages() );

                $this->out(['status' => 403]);
            }

            $this->out(['status' => 200]);

        }

	}

}