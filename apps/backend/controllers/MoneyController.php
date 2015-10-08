<?php

namespace Multiple\Backend\Controllers;

class MoneyController extends CrudController
{
    protected $modelClass = 'Money';
    protected $formClass = 'Multiple\Backend\Forms\MoneyForm';
    protected $baseUrl = 'haku/money/';
    protected $editTemplate = 'money/edit';


}