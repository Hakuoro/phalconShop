<?php

namespace Multiple\Backend\Controllers;


class ProductController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{echo 111; exit;
		$this->view->setVar('product', \Product::findFirst());
	}

    public function showAction()
    {echo 222; exit;
        $this->view->setVar('product', \Product::findFirst());
    }

}