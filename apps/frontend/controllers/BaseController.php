<?php

namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class BaseController extends Controller
{

    const SESSION_ID_KEY = 'session_id_key';

    protected $user = false;

    /**
     * Execute before the router so we can determine if this is a provate controller, and must be authenticated, or a
     * public controller that is open to all.
     *
     * @param Dispatcher $dispatcher
     * @return boolean
     */
    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {


        if ($this->session->has(static::SESSION_ID_KEY)){

            $this->user = \User::findFirst((int)$this->session->get(static::SESSION_ID_KEY));

        }

        $this->view->user = $this->user;

    }
}
