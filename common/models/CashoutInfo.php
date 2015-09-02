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
    public $cost;

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
            'bank_date' => 'bank_date',
            'cost' => 'cost'
        );
    }

    public function initialize()
    {
        $this->hasMany('id', 'Trade', 'id_cashout');
        $this->keepSnapshots(true);
    }

    protected function calculateFunds()
    {

        $this->rate = round( $this->pal_sum / $this->op_sum, 2);
    }

    public function beforeCreate()
    {
        $this->calculateFunds();
    }

    public function beforeUpdate()
    {
        $this->calculateFunds();
    }

}
