<?php

namespace Multiple\Backend\Controllers;

class TradeController extends CrudController
{
    protected $modelClass = 'Trade';
    protected $formClass = 'Multiple\Backend\Forms\TradeForm';
    protected $baseUrl = 'haku/trade/';
    protected $editTemplate = 'trade/edit';

    public function listAction()
    {

        $params = $this->dispatcher->getParams();

        $model = ($this->modelClass);

        if (isset($params['cash'])){

            if ($params['cash'] == 'closed'){
                $entities = $this->getClosedTrades();
            }elseif ($params['cash'] == 'active'){
                $entities = $this->getActiveTrades();
            }elseif ($params['cash'] == 'all') {
                $request['order'] = "id DESC";
                $entities =  $model::find($request);
            }else {
                $request = ["id_cashout=".(int)$params['cash']];
                $request['order'] = "id DESC";
                $entities =  $model::find($request);
            }
        }else{
            $entities = $this->getLastTrades();
        }



        if ($this->request->isAjax()){
            $this->view->disable();

            $this->response->setJsonContent(
                [
                    'status' => 200,
                    'entities' => $entities
                ]
            );

            return $this->response;
        }else{
            $this->view->entities = $entities;
        }

    }

    protected function getLastTrades(){

        $sql = "Select Trade.* From Trade where id_cashout = (Select max(CashoutInfo.id) from CashoutInfo) order by Trade.id DESC";

        $entities = $this->modelsManager
            ->createQuery($sql)
            ->execute();

        return $entities;
    }

    protected function getActiveTrades(){

        $sql = "Select Trade.* From Trade inner join CashoutInfo on Trade.id_cashout = CashoutInfo.id where pal_sum = 0.00 order by Trade.id DESC";

        $entities = $this->modelsManager
            ->createQuery($sql)
            ->execute();

        return $entities;
    }

    protected function getClosedTrades(){

        $sql = "Select Trade.* From Trade inner join CashoutInfo on Trade.id_cashout = CashoutInfo.id where pal_sum > 0.00 order by Trade.id DESC";

        $entities = $this->modelsManager
            ->createQuery($sql)
            ->execute();

        return $entities;
    }

    protected function beforeBind()
    {

        if(!$this->entity->id_cashout){

            $cashout = \CashoutInfo::findFirst(["order" => "id DESC"]);

            $this->entity->id_cashout = $cashout->id;

        }


    }

    protected function beforeSave()
    {

        if ( (!$this->entity->hasSnapshotData()) || $this->entity->hasChanged('purchase') ){
            $this->entity->purchase *= 1.0267;
        }
    }

}