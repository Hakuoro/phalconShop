<?php

class Money extends \Phalcon\Mvc\Model
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
    public $opdate;

    /**
     *
     * @var double
     */
    public $opsum;

    /**
     *
     * @var double
     */
    public $money;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'money';
    }

    public function columnMap()
    {
        return array(
            'id' => 'id',
            'opdate' => 'opdate',
            'opsum' => 'opsum',
            'money' => 'money',
        );
    }

}
