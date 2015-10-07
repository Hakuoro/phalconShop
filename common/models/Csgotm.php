<?php

class Csgotm extends \Phalcon\Mvc\Model
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
    public $sale;

    /**
     *
     * @var integer
     */
    public $when_sale;

    /**
     *
     * @var integer
     */
    public $csgotm_id;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'id_skin' => 'id_skin',
            'sale' => 'sale',
            'when_sale' => 'when_sale',
            'csgotm_id' => 'csgotm_id',
        );
    }

}
