<?php

class CashoutInfo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var double
     */
    public $rest;

    /**
     *
     * @var double
     */
    public $op_send;

    /**
     *
     * @var double
     */
    public $op_sum;

    /**
     *
     * @var double
     */
    public $pal_sum;

    /**
     *
     * @var double
     */
    public $rate;

    /**
     *
     * @var string
     */
    public $op_date;

    /**
     *
     * @var string
     */
    public $pal_date;

    /**
     *
     * @var string
     */
    public $bank_date;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'op_sum' => 'op_sum', 
            'op_send' => 'op_send',
            'rest' => 'rest',
            'pal_sum' => 'pal_sum',
            'rate' => 'rate', 
            'op_date' => 'op_date', 
            'pal_date' => 'pal_date', 
            'bank_date' => 'bank_date'
        );
    }

    public function initialize()
    {
       $this->hasMany('id', 'Trade', 'id_cashout');
    }

}
