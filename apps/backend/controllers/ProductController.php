<?php

namespace Multiple\Backend\Controllers;


use Multiple\Backend\Forms\ProductForm;

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


        $form = new ProductForm();


        if ($this->request->isPost()){



            print_r($form->getMessages());


            if ($form->isValid($this->request->getPost())){


                $product = $form->getEntity();

                print_r($product);



            }else{

                $this->flash->message();
            }



        }

        $this->view->product = \Product::findFirst($id);

        if ($this->view->product)
            $form->setEntity($this->view->product);

        $this->view->form = $form;

    }

    public function saveAction()
    {}

    public function deleteAction()
    {}

}