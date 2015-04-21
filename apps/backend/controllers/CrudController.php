<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\View;

class CrudController extends \Phalcon\Mvc\Controller
{
    protected $modelClass = '';
    protected $formClass = '';
    protected $baseUrl = '';
    protected $editTemplate = '';

    public function listAction()
    {
        $model = ($this->modelClass);
        $entities =  $model::find();

        if ($this->request->isAjax()){
            $this->view->disable();

            $this->response->setJsonContent(
                [
                    'status' => 200,
                    'entities' => $entities
                ]
            );

            return $this->response;
        }else{
            $this->view->entities = $entities;
        }

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

        $this->view->entity = $entity;
        $this->view->form = $form;

    }
}