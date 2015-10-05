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

            if ($trade->sale && $trade->sale_free == 0){
                $trade->calculateFreeSale();
            }


            if ($trade->sale && $trade->sale_free && $cashout->op_sum && $cashout->pal_sum){

                $trade->sale_rub = round($trade->sale_free / $cashout->op_sum * $cashout->pal_sum, 2);

                $trade->income = round($trade->sale_rub - $trade->purchase, 2);

                $trade->income_percent = round($trade->income / $trade->purchase * 100, 2);


                $trade->save();

            }

        }

        $cashout->cost = $summ;


        $cashout->save();

        $this->response->redirect($this->baseUrl);
    }
}