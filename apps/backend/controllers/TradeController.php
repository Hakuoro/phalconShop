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

}