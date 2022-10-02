<?php

namespace app\core;


class Application
{
    public string $layout = 'main';
    public string $userClass;
    public static $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public static Application $app;
    // public Controller $controller;
    //public Session $session;
    public View $view;
    // public ?DbModel $user;

    public function __construct($rootPath, $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = dirname($rootPath);
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        //$this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']); 
        $this->view = new View();
    }
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
    public function getController(): Controller
    {
        return $this->controller;
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
