<?php
namespace app\core;

use app\core\Application;

class Controller{
    public string $layout = 'main';
    public string $action = '';

    public function setLayout($layout)
    { 
        $this->$layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }
}