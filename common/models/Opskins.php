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
     * @var integer
     */
    public $id_skin;


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
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'id_skin' => 'id_skin',
            'price' => 'price',
            'sale' => 'sale', 
            'sale_time' => 'sale_time', 
            'when_sale' => 'when_sale', 
        );
    }

}
