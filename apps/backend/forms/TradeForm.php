<?php

namespace Multiple\Backend\Forms;


use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;


class TradeForm extends \Phalcon\Forms\Form
{
    public function initialize($entity = null, $options = null)
    {

        $id = new Hidden('id');
        $this->add($id);

        $name = new Text('id_cashout', array(
            'placeholder' => 'id_cashout'
        ));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Введите id_cashout'
            ))
        ));
        $this->add($name);

        $name = new Text('id_skin', array(
            'placeholder' => 'id_skin'
        ));

        $this->add($name);

        $name = new Text('purchase', array(
            'placeholder' => 'purchase'
        ));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Введите purchase'
            ))
        ));
        $this->add($name);

        $name = new Text('sale', array(
            'placeholder' => 'sale'
        ));

        $this->add($name);


    }
}