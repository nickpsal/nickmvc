<?php
    namespace app\core;
    use app\core\Request;

    class Application{
        public static string $ROOT_DIR;
        public Request $request;
        public Router $router;
        public Response $response;
        public Database $db;
        public Controller $controller;
        public static Application $app;
        
        public function __construct($rootPath, array $config){
            self::$ROOT_DIR = $rootPath;
            self::$app = $this;
            $this->response = new Response();
            $this->request = new Request();
            $this->db = new Database($config['db']);
            $this->router = new Router($this->request, $this->response);
        }

        public function run() {
            echo $this->router->resolve();
        }

        /**
         * Get the value of controller
         */ 
        public function getController()
        {
            return $this->controller;
        }

        /**
         * Set the value of controller
         *
         * @return  self
         */ 
        public function setController($controller)
        {
            $this->controller = $controller;
            return $this;
        }
    }