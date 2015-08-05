<?php

namespace Multiple\Frontend\Controllers;

class BaseController extends \Phalcon\Mvc\Controller
{


    protected function out($ret)
    {
        echo json_encode($ret);
        exit;
    }

}