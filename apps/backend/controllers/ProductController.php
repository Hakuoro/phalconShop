<?php

namespace Multiple\Backend\Controllers;


class ProductController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
		$this->view->product =  \Product::findFirst();
	}

    public function showAction()
    {
        $this->view->product = \Product::findFirst();
    }

}