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
}