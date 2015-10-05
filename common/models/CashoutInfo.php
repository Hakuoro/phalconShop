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

        if ($this->op_sum && $this->pal_sum ) {

            $this->rate = round( $this->pal_sum / $this->op_sum, 2);

            /*$trades = Trade::find(['id_cashout='.$this->id]);

            foreach ($trades as $trade) {

                $trade->sale_rub = round($trade->sale_free / ($this->op_sum) * $this->pal_sum,
                    2);

                $trade->income = round($trade->sale_rub - $trade->purchase, 2);

                $trade->income_percent = round($trade->income / $trade->purchase * 100, 2);

                $trade->save();
            }*/

        }

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
