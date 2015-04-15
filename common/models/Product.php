<?php
namespace Common\Models;

class Product extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var integer
     */
    public $price;

    /**
     *
     * @var string
     */
    public $meta_title;

    /**
     *
     * @var string
     */
    public $meta_keyword;

    /**
     *
     * @var string
     */
    public $meta_description;

    /**
     *
     * @var string
     */
    public $url;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'title' => 'title', 
            'description' => 'description', 
            'price' => 'price', 
            'meta_title' => 'meta_title', 
            'meta_keyword' => 'meta_keyword', 
            'meta_description' => 'meta_description', 
            'url' => 'url', 
            'status' => 'status'
        );
    }

    public function initialize()
    {
        $this->hasManyToMany(
            "id",
            "TagLink",
            "id_item", "id_tag",
            "Tag",
            "id"
        );
    }

    /*public function initialize()
    {
        $this->hasMany("id", "TagLink", "id_item");
    }*/







}
