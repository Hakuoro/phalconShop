<?php

class Trade extends \Phalcon\Mvc\Model
{

    const PAYPAL_CUT = 0.971;
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

        if ($this->sale && !$this->sale_free){

            $this->sale_free = round($this->sale * self::PAYPAL_CUT , 2);

            /*if ($this->getCashoutInfo()->op_sum && $this->getCashoutInfo()->pal_sum ) {
                $this->sale_rub = round($this->sale_free / ($this->getCashoutInfo()->op_sum) * $this->getCashoutInfo()->pal_sum,
                    2);

                $this->income = round($this->sale_rub - $this->purchase, 2);

                $this->income_percent = round($this->income / $this->purchase * 100, 2);
            }*/


           /* $sql = "UPDATE CashoutInfo SET op_send  = (SELECT sum(sale) as op_send FROM Trade where id_cashout = $this->id_cashout) - rest
            where id = $this->id_cashout";

            $this->_modelsManager
                ->createQuery($sql)
                ->execute();

            $sql = "UPDATE CashoutInfo SET op_sum = (SELECT sum(sale_free) as op_sum FROM Trade where id_cashout = $this->id_cashout)
            where id = $this->id_cashout";

            $this->_modelsManager
                ->createQuery($sql)
                ->execute();*/
        }


       /* $sql = "UPDATE CashoutInfo SET cost = (SELECT sum(purchase) as cost FROM Trade where id_cashout = $this->id_cashout)
            where id = $this->id_cashout";

        $this->_modelsManager
            ->createQuery($sql)
            ->execute();*/

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
