<?php

namespace Multiple\Frontend\Controllers;

class RouteController extends \Phalcon\Mvc\Controller
{

    const EARTH_RADIUS = 6372795;

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

        if ($this->request->isPost() && $this->request->isAjax()){
            $postData = json_decode(file_get_contents('php://input'));


            $route = !empty($postData->id)?\Route::findFirst(['id' => (int) $postData->id]):new \Route();
            $route->name = $postData->name;
            $route->id_user = 1;

            if ($route->id) {
                $this->modelsManager
                    ->createQuery("DELETE FROM Point WHERE id_route = :route:")
                    ->execute(['route' => $route->id]);
            }
            $route->save();

            $firstPoint = null;
            $i = 0;

            foreach ($postData->coordinats as $point){

                $pointModel = new \Point();
                $pointModel->id_route = $route->id;

                $pointModel->x = $point[0];
                $pointModel->y = $point[1];

                $pointModel->num = $i;

                $pointModel->save();


              /*  if ($firstPoint !== null){

                    $distance = new \Distance();
                    $distance->id_route = $route->id;
                    $distance->xy = $firstPoint->id.$pointModel->id;
                    $distance->dis = $this->calculateTheDistance($firstPoint->x, $firstPoint->y, $pointModel->x, $pointModel->y);
                    //$distance->dis = sqrt( pow($pointModel->x - $firstPoint->x, 2 )  + pow($pointModel->y - $firstPoint->y, 2 ) );

                    $distance->save();
                }

                $firstPoint = $pointModel;*/
                $i++;
            }

        }

        $ret = [
            'status' => 200
        ];

        echo json_encode($ret);

        exit;

    }


    function calculateTheDistance ($lat1, $long1, $lat2, $long2 /*$φA, $λA, $φB, $λB*/) {

        // перевести координаты в радианы
        $lat1 = $lat1 * M_PI / 180;
        $lat2 = $lat2 * M_PI / 180;
        $long1 = $long1 * M_PI / 180;
        $long2 = $long2 * M_PI / 180;

        // косинусы и синусы широт и разницы долгот
        $cl1 = cos($lat1);
        $cl2 = cos($lat2);
        $sl1 = sin($lat1);
        $sl2 = sin($lat2);
        $delta = $long2 - $long1;
        $cdelta = cos($delta);
        $sdelta = sin($delta);

        // вычисления длины большого круга
        $y = sqrt(pow($cl2 * $sdelta, 2) + pow($cl1 * $sl2 - $sl1 * $cl2 * $cdelta, 2));
        $x = $sl1 * $sl2 + $cl1 * $cl2 * $cdelta;

        //
        $ad = atan2($y, $x);
        $dist = $ad * self::EARTH_RADIUS;

        return $dist;
    }

}