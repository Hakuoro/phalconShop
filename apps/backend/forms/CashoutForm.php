<?php

namespace Multiple\Backend\Forms;


use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;


class CashoutForm extends \Phalcon\Forms\Form
{
    public function initialize($entity = null, $options = null)
    {

        $id = new Hidden('id');
        $this->add($id);

        $name = new Text('rest', array(
            'placeholder' => 'rest'
        ));

        $this->add($name);

        $name = new Text('op_sum', array(
            'placeholder' => 'op_sum'
        ));

        $this->add($name);

        $name = new Text('op_send', array(
            'placeholder' => 'op_send'
        ));
        $this->add($name);


        $name = new Text('pal_sum', array(
            'placeholder' => 'pal_sum'
        ));

        $this->add($name);

        $name = new Text('op_date', array(
            'placeholder' => 'op_date'
        ));

        $this->add($name);

        $name = new Text('pal_date', array(
            'placeholder' => 'pal_date'
        ));

        $this->add($name);

        $name = new Text('bank_date', array(
            'placeholder' => 'bank_date'
        ));

        $this->add($name);

        $this->add($name);

        $name = new Text('cost', array(
            'placeholder' => 'cost'
        ));

        $this->add($name);

    }
}