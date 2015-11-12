<?php

class User extends \Phalcon\Mvc\Model
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
    public $id_steam;

    /**
     *
     * @var string
     */
    public $trade_link;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'id_steam' => 'id_steam',
            'trade_link' => 'trade_link'
        );
    }

}
