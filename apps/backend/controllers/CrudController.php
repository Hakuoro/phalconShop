<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\View;

class CrudController extends \Phalcon\Mvc\Controller
{
    protected $modelClass = '';
    protected $formClass = '';
    protected $baseUrl = '';
    protected $editTemplate = '';

    protected $entity;

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

        $this->entity = $model::findFirst($id);

        $form = new $this->formClass($this->entity);

        $form->bind($_POST, $this->entity);

        if ($this->request->isPost()){

            if ($form->isValid($this->request->getPost())){
                if ($this->entity->save()){
                    $this->saveTags();
                    $this->response->redirect($this->baseUrl . $this->entity->id);
                }
            }else{
                print_r($form->getMessages());
                exit;
            }
        }

        $this->view->pick($this->editTemplate);

        $this->view->entity = $this->entity;
        $this->view->form = $form;

    }

    protected function saveTags()
    {

    }

}