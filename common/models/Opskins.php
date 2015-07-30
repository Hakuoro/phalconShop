<?php

class Opskins extends \Phalcon\Mvc\Model
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
    public $name;

    /**
     *
     * @var string
     */
    public $link;

    /**
     *
     * @var integer
     */
    public $price;

    /**
     *
     * @var integer
     */
    public $sale;

    /**
     *
     * @var string
     */
    public $sale_time;

    /**
     *
     * @var integer
     */
    public $when_sale;

    /**
     *
     * @var integer
     */
    public $op_id;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'name' => 'name', 
            'link' => 'link', 
            'price' => 'price', 
            'sale' => 'sale', 
            'sale_time' => 'sale_time', 
            'when_sale' => 'when_sale', 
            'op_id' => 'op_id'
        );
    }

}
