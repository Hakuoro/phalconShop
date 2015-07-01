<?php

class Point extends \Phalcon\Mvc\Model
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
    public $id_route;

    /**
     *
     * @var string
     */
    public $x;

    /**
     *
     * @var string
     */
    public $y;

    /**
     *
     * @var integer
     */
    public $num;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'id_route' => 'id_route', 
            'x' => 'x', 
            'y' => 'y', 
            'num' => 'num'
        );
    }

}
