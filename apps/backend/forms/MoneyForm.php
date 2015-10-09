<?php

namespace Multiple\Backend\Forms;


use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;


class MoneyForm extends \Phalcon\Forms\Form
{
    public function initialize($entity = null, $options = null)
    {

        $id = new Hidden('id');
        $this->add($id);

        $name = new Text('opdate', array(
            'placeholder' => 'date'
        ));

        $this->add($name);

        $name = new Text('opsum', array(
            'placeholder' => 'sum'
        ));

        $this->add($name);

        $name = new Text('money', array(
            'placeholder' => 'money'
        ));

        $this->add($name);
    }
}