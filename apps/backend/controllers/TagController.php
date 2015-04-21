<?php

namespace Multiple\Backend\Controllers;


class TagController extends CrudController
{

    public function listpAction($id)
    {

        $this->view->disable();


        /** @var \Phalcon\Db\Adapter\Pdo\Mysql $dbh */
        $dbh = $this->db;

        if (!$id)
            return;


        $sql = '
        select id, name from
            tag where id not in (
            SELECT t1.id FROM
            tag t1
            inner join tag_link t2 on t1.id = t2.id_tag
            where id_item = :product
            )
        ';


        $sth =  $dbh->prepare($sql);

        $sth->bindParam(':product', $id, \PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

        $this->response->setJsonContent(
            [
                'status' => 200,
                'tags' => $result
            ]
        );

        return $this->response;

    }

}