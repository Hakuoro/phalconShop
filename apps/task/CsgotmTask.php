<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 13.07.2015
 * Time: 21:29
 */
use Phalcon\Logger\Adapter\File as FileAdapter;

class CsgotmTask extends \Phalcon\CLI\Task
{

    public function mainAction() {


        $res = file_get_contents('https://csgo.tm/history/json/');


        $res = json_decode($res);

        $insert = 0;
        $logger = new FileAdapter("/www/logs/lke/clicsgotm.log");
        if (is_array($res) && count($res)){

            foreach($res as $item){


                $name = $item->hash_name;

                $skin = Skinstm::findFirst("name = ".($this->db->escapeString($name)));

                if (!$skin) {
                    $skin = new Skinstm();
                    $skin->name = $name;
                    if (!$skin->save()){
                        print_r($skin->getMessages());
                    }
                }

                $op = Csgotm::findFirst("csgotm_id = ".$item->id);

                if ($op) {
                    continue;
                }

                $op = new Csgotm();

                $op->id_skin = $skin->id;
                $op->sale = (int)$item->price;
                $op->when_sale = (int)$item->time;
                $op->csgotm_id = (int)$item->id;

                if (!$op->save()){
                    $logger->error("Cannot save");
                    print_r($op->getMessages());
                }
                $insert++;

            }


        }else {
            $logger->error("Cannot find data. Response".$res);
            mail ( 'pechor@gmail.com' , 'Error csgotm scan' , 'error' );
        }
        $logger->info("Find: ". count($res).". Inserted $insert");

        exit;
    }

}