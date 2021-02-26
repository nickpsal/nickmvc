<?php
    namespace app\core;

    use app\controllers\SiteController;
    use app\core\Request;

    class Application{
        public static string $ROOT_DIR;
        public Request $request;
        public Router $router;
        public Response $response;
        public static Application $app;
        
        public function __construct($rootPath){
            self::$ROOT_DIR = $rootPath;
            self::$app = $this;
            $this->response = new Response();
            $this->request = new Request();
            $this->router = new Router($this->request, $this->response);
        }

        public function run() {
            echo $this->router->resolve();
        }
    }