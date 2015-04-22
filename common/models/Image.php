<?php

class Image extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $id_product;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $meta_title;

    /**
     *
     * @var string
     */
    public $meta_keywords;

    /**
     *
     * @var string
     */
    public $meta_description;

    /**
     *
     * @var string
     */
    public $preview;

    /**
     *
     * @var string
     */
    public $standart;

    /**
     *
     * @var string
     */
    public $big;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'id_product' => 'id_product',
            'title' => 'title',
            'meta_title' => 'meta_title', 
            'meta_keywords' => 'meta_keywords', 
            'meta_description' => 'meta_description', 
            'preview' => 'preview', 
            'standart' => 'standart', 
            'big' => 'big'
        );
    }

    public function initialize()
    {
        $this->belongsTo("id_product", "Product", "id");
    }

}
