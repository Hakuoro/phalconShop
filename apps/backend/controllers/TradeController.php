<?php

namespace Multiple\Backend\Controllers;

class TradeController extends CrudController
{
    protected $modelClass = 'Trade';
    protected $formClass = 'Multiple\Backend\Forms\TradeForm';
    protected $baseUrl = 'haku/trade/';
    protected $editTemplate = 'trade/edit';


    protected function calculateFunds()
    {

        if ( !empty($this->entity->getCashoutInfo()->rate) &&  !empty($this->entity->sale_rub)){

            $rate = $this->entity->getCashoutInfo()->rate;

            $this->entity->sale_rub = $this->entity->sale * $rate;

            $this->entity->income = $this->entity->sale_rub - $this->entity->purchase;

            $this->entity->income_percent = $this->entity->income / $this->entity->purchase * 100;

        }
    }

    public function editAction($id)
    {
        /** @var \Trade $model */
        $model = $this->modelClass;

        $this->entity = $id?$model::findFirst($id):new $model();

        $form = new $this->formClass($this->entity);

        $form->bind($_POST, $this->entity);

        if ($this->request->isPost()){

            if ($form->isValid($this->request->getPost())){

                $this->calculateFunds();

                if ($this->entity->save()){

                    $this->saveTags();
                    $this->response->redirect($this->baseUrl . $this->entity->id);
                }else{

                    print_r($this->entity->getMessages());
                    exit;

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


}