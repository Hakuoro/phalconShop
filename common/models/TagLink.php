<?php

class TagLink extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_tag;

    /**
     *
     * @var integer
     */
    public $id_item;

    /**
     *
     * @var string
     */
    public $type;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id_tag' => 'id_tag', 
            'id_item' => 'id_item', 
            'type' => 'type'
        );
    }

    public function initialize()
    {
        $this->belongsTo("id_tag", "Tag", "id", ['foreignKey' => ['action' => \Phalcon\Mvc\Model\Relation::NO_ACTION]]);
        $this->belongsTo("id_item", "Product", "id", ['foreignKey' => ['action' => \Phalcon\Mvc\Model\Relation::NO_ACTION]]);
    }

}
