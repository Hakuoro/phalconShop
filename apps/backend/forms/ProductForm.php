<?php

namespace Multiple\Backend\Forms;


use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;


class ProductForm extends \Phalcon\Forms\Form
{
    public function initialize($entity = null, $options = null)
    {
        if (isset($options['edit'])) {
            $id = new \Phalcon\Forms\Element\Hidden('id');
            $this->add($id);
        }

        $name = new Text('title', array(
            'placeholder' => 'Название'
        ));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Введите название'
            ))
        ));
        $this->add($name);

        $email = new TextArea('description', array(
            'placeholder' => 'Описание'
        ));

        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'Описание обязательно'
            )),
        ));
        $this->add($email);

        $price = new Text('price', array(
            'placeholder' => 'Описание'
        ));

        $price->addValidators([
            new PresenceOf(array(
                'message' => 'Цена обязательна'
            )),
            new Regex ([
                'pattern' => '/^\D$/',
                'message' => 'The creation date is invalid'
            ])
        ]);
        $this->add($price);



    }
}