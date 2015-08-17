<?php

use Phalcon\Mvc\Model\Behavior\Timestampable;

class Training extends \Phalcon\Mvc\Model
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
     * @var integer
     */
    public $distance;

    /**
     *
     * @var string
     */
    public $date;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'id_route' => 'id_route', 
            'distance' => 'distance', 
            'date' => 'date'
        );
    }

    public function initialize()
    {
        $this->skipAttributesOnCreate(['date']);
    }

}
