<?php

namespace Multiple\Backend\Controllers;

class BotsController extends \Phalcon\Mvc\Controller
{

	public function listAction()
	{

		$this->view->bots = \BotConfig::find();
	}

    public function showAction($id)
    {

        $this->view->bots = \BotConfig::find();
        $bot = $this->view->showBot = \BotConfig::findFirst((int) $id);
        $this->view->botConfig = json_decode($bot->config);

    }

    public function saveAction($id)
    {

        //$this->view->bots = \BotConfig::find();
        $bot = \BotConfig::findFirst((int) $id);

        if ($bot && $this->request->isPost()){

            $config = json_decode($bot->config);

            $data = $this->request->getPost();

            $config->give = isset($data['give']);

            foreach($data['price'] as $item => $price){
                $config->tradeConfig->{$item}->price = $price;
            }


            foreach($config->tradeConfig as $item){
                $item->trading = false;
            }

            foreach($data['trading'] as $item => $price){
                $config->tradeConfig->{$item}->trading = true;
            }

            $bot->config = json_encode($config);

            if (!$bot->save()){
                echo "cannot save". var_export($bot->getMessages(),1);
                exit;
            }

        }

        $this->response->redirect('/haku/bots/show/'.$id);

    }

}
/*
Array
(
    [id_bot] => 77
    [give] => on
    [price] => Array
(
    [1293508920_0] => 17.1
            [384801319_0] => 1.61
            [926978479_0] => 1.61
            [991959905_0] => 1.51
            [720268538_0] => 1.31
        )

    [trading] => Array
(
    [1293508920_0] => on
            [384801319_0] => on
            [926978479_0] => on
            [991959905_0] => on
            [720268538_0] => on
        )

    [auto] => Array
(
    [1293508920_0] => on
            [384801319_0] => on
            [926978479_0] => on
            [991959905_0] => on
            [720268538_0] => on
        )

    [Save] => Save
)
*/