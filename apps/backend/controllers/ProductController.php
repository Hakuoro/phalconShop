<?php

namespace Multiple\Backend\Controllers;


class ProductController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
		$this->view->products =  \Product::find();
        /*$p = \Product::findFirst();

        print_r($p->tag);

        exit;*/
	}

    public function showAction($id)
    {
        $product = \Product::findFirst($id);
    }

    public function saveAction()
    {}

    public function deleteAction()
    {}

}