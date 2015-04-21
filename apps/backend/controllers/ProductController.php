<?php

namespace Multiple\Backend\Controllers;

class ProductController extends CrudController
{
    protected $modelClass = 'Common\Models\Product';
    protected $formClass = 'Multiple\Backend\Forms\ProductForm';
    protected $baseUrl = 'haku/product/';
    protected $editTemplate = 'product/edit';

    public function editAction($id)
    {

        parent::editAction($id);

    }
}