<?php

class Distance extends \Phalcon\Mvc\Model
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
    public $xy;

    /**
     *
     * @var double
     */
    public $dis;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'id_route' => 'id_route', 
            'xy' => 'xy', 
            'dis' => 'dis'
        );
    }

}
