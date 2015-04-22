<?php
namespace Multiple\Backend\Plugins;

use \Phalcon\Events\Event;
use \Phalcon\Mvc\Dispatcher;

class BackendAssets extends \Phalcon\Mvc\User\Component
{

	protected $_module;

	public function __construct($module)
	{
		$this->_module = $module;
	}

	public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
	{
        /** @var \Phalcon\Mvc\Controller $controller */
        $controller =  $dispatcher->getActiveController();

        $controller->view->currentPage =  $controller->request->getURI();

        $controller->assets

            ->addCss('//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', false)
            ->addCss('css/dashboard.css')
            ->addCss('css/fm.selectator.jquery.css')
        ;

        $controller->assets
            ->addJs('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', false)
            ->addJs('js/bootstrap.min.js')
            ->addJs('js/holder.js')
            ->addJs('js/fm.selectator.jquery.js')
            ->addJs('js/product.select.js')
            ->addJs('js/vendor/jquery.ui.widget.js')
            ->addJs('js/jquery.fileupload.js')
            ->addJs('js/jquery.fileupload-process.js')
            ->addJs('js/jquery.fileupload-image.js')

        ;

	}
}