<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\frontController;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;


    protected $_data= [];

    public function notFoundAction()
    {
        $this->__view();
    }

    public function setController($controllername)
    {
        $this->_controller = $controllername;
    }

    public function setAction($actionName)
    {
        $this->_action = $actionName;
    }

    public function setParams($params)
    {
        $this->_params = $params;
    }

    protected function __view()
    {
        if ($this->_action == frontController::Not_Found_Action) {
            require_once VIEWS_PATH . 'Notfound' . DS . 'notfound.view.php';
        } else {
            $view = VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';
            if (file_exists($view)) {
                extract($this->_data);

                require_once TEMPLATE_PATH . 'templateheaderstart.php';
                require_once TEMPLATE_PATH .  'templateheaderEnd.php';
                require_once TEMPLATE_PATH .  'wrapperstart.php';
                require_once TEMPLATE_PATH .  'header.php';
                require_once TEMPLATE_PATH .  'nav.php';
                require_once $view;
                require_once TEMPLATE_PATH .  'wrapperend.php';
                require_once TEMPLATE_PATH .  'templatefooter.php';
            } else {

                require_once VIEWS_PATH . 'notfound' . DS . 'noview.view.php';
            }
        }

    }
}
