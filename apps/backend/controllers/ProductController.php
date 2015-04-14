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

        $entity = \Product::findFirst($id);

        $form = new ProductForm($entity);

        $form->bind($_POST, $entity);

        if ($this->request->isPost()){

            if ($form->isValid($this->request->getPost())){
                $entity->save();
            }else{
                print_r($form->getMessages());
                exit;
            }
        }

        $this->view->product = $entity;

        $this->view->form = $form;

    }

    public function saveAction()
    {}

    public function deleteAction()
    {}

}