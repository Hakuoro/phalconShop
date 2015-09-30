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


        //print_r($this->dispatcher->getParams());
        //exit;

        $model = ($this->modelClass);
        $entities =  $model::find(["order" => "id DESC"]);

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