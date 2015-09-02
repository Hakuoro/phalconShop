<?php

namespace Multiple\Backend\Controllers;

class TradeController extends CrudController
{
    protected $modelClass = 'Trade';
    protected $formClass = 'Multiple\Backend\Forms\TradeForm';
    protected $baseUrl = 'haku/trade/';
    protected $editTemplate = 'trade/edit';

}