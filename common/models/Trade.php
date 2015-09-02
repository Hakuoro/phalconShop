<?php

class Trade extends \Phalcon\Mvc\Model
{

    const PAYPAL_CUT = 0.97;
    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $id_cashout;

    /**
     *
     * @var double
     */
    public $purchase;

    /**
     *
     * @var double
     */
    public $sale;

    /**
     *
     * @var double
     */
    public $sale_free;

    /**
     *
     * @var integer
     */
    public $id_skin;

    /**
     *
     * @var double
     */
    public $sale_rub;

    /**
     *
     * @var double
     */
    public $income;

    /**
     *
     * @var double
     */
    public $income_percent;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'id_cashout' => 'id_cashout', 
            'purchase' => 'purchase', 
            'sale' => 'sale', 
            'sale_free' => 'sale_free',
            'id_skin' => 'id_skin',
            'sale_rub' => 'sale_rub', 
            'income' => 'income', 
            'income_percent' => 'income_percent'
        );
    }

    public function initialize()
    {
        $this->hasOne('id_skin', 'Skins', 'id');

        $this->hasOne('id_cashout', 'CashoutInfo', 'id');

        //$this->belongsTo("id_cashout", "CashoutInfo", "id");

        $this->keepSnapshots(true);
    }

    protected function calculateFunds()
    {

        if ($this->sale){


            $rate = self::PAYPAL_CUT ;

            $this->sale_free = round($this->sale * $rate, 2);

            if ($this->getCashoutInfo()->op_sum && $this->getCashoutInfo()->pal_sum ) {
                $this->sale_rub = round($this->sale_free / ($this->getCashoutInfo()->op_sum) * $this->getCashoutInfo()->pal_sum,
                    2);

                $this->income = round($this->sale_rub - $this->purchase, 2);

                $this->income_percent = round($this->income / $this->purchase * 100, 2);
            }

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
