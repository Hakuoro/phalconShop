<?php

namespace Multiple\Backend\Controllers;

class CashoutController extends CrudController
{
    protected $modelClass = 'CashoutInfo';
    protected $formClass = 'Multiple\Backend\Forms\CashoutForm';
    protected $baseUrl = 'haku/cashout/';
    protected $editTemplate = 'cashout/edit';

    public function listAction()
    {
        parent::listAction();



    }



    public function calculateAction($id){


        $cashout = \CashoutInfo::findFirst($id);


        $trades = \Trade::find(['id_cashout='.$id]);

        $summ = 0;

        foreach ($trades as $trade) {

            $summ += $trade->purchase;

        }

        $cashout->cost = $summ;


        $cashout->save();

        $this->response->redirect($this->baseUrl);
    }
}