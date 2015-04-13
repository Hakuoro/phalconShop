<?php

namespace Multiple\Frontend\Controllers;

class IndexController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{

        // показываем товары
        $this->view->products = \Product::find();
	}

    public function showAction()
    {
        echo 11135634564563456; exit;
        // показываем товары
        $this->view->products = \Product::find();
    }

}