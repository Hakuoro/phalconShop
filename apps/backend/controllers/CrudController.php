<?php

namespace Multiple\Backend\Controllers;

class CrudController extends \Phalcon\Mvc\Controller
{
    protected $modelClass = '';
    protected $formClass = '';
    protected $baseUrl = '';
    protected $editTemplate = '';

    public function listAction()
    {
        $model = $this->modelClass;
        $this->view->products =  $model::find();
    }

    public function editAction($id)
    {
        $model = $this->modelClass;

        $entity = $model::findFirst($id);

        $form = new $this->formClass($entity);

        $form->bind($_POST, $entity);

        if ($this->request->isPost()){

            if ($form->isValid($this->request->getPost())){
                if ($entity->save()){
                    $this->response->redirect($this->baseUrl . $entity->id);
                }
            }else{
                print_r($form->getMessages());
                exit;
            }
        }

        $this->view->pick($this->editTemplate);

        $this->view->product = $entity;
        $this->view->form = $form;

    }
}