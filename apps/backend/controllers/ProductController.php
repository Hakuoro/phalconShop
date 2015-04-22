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

        $productTagIds = [];

        foreach($this->entity->tag as $tag){

            $productTagIds[$tag->id] = 1;
        }

        // получение всех тегов
        $tags = \Tag::find();


        $retTags = [];
        foreach($tags as $tag){

            $retTags[$tag->id] = $tag->toArray();

            if (array_key_exists($tag->id, $productTagIds)){
                $retTags[$tag->id]['selected'] = true;
            }else{
                $retTags[$tag->id]['selected'] = false;
            }
        }


        $this->view->tags = $retTags;
    }
    protected function saveTags()
    {

        $tags = $this->request->getPost('tags');

        $sql = 'DELETE FROM tag_link WHERE id_item =:id';

        /** @var \Phalcon\Db\Adapter\Pdo\Mysql $dbh */
        $dbh = $this->db;

        $sth =  $dbh->prepare($sql);

        $sth->bindParam(':id', $this->entity->id, \PDO::PARAM_INT);

        $sth->execute();

        foreach($tags as $tagId){

            $tagLink = new \TagLink();

            $tagLink->save([
                'id_item'   => $this->entity->id,
                'id_tag'    => (int) $tagId,
                'type'      => 'product'
            ]);
        }
    }

}