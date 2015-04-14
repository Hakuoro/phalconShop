<?php

namespace Multiple\Backend\Forms;


use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;


class ProductForm extends \Phalcon\Forms\Form
{
    public function initialize($entity = null, $options = null)
    {

        $id = new Hidden('id');
        $this->add($id);

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
            ))
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
                'pattern' => '/^(\d).*$/',
                'message' => 'Цена неверная'
            ])
        ]);
        $this->add($price);

        $url = new Text('url', array(
            'placeholder' => 'SEO Url'
        ));
        $url->addValidators(array(
            new PresenceOf(array(
                'message' => 'Введите урл'
            ))
        ));
        $this->add($url);


        $this->add(
            new Select('status',
                [
                    '1' => 'Активен',
                    '2' => 'Отключен'
                ]
            )
        );

    }
}