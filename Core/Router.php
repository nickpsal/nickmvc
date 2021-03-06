<?php
    namespace app\core;

    use app\controllers\SiteController;
    use app\core\Application;

    class Router{
        public Request $request;
        public Response $response;
        protected array $routes = [];

        public function __construct(Request $request, Response $response)
        {
            $this->request = $request;
            $this->response = $response;
        }

        public function get($path,$callback){
            $this->routes['get'][$path] = $callback;
        }

        public function post($path,$callback){
            $this->routes['post'][$path] = $callback;
        }

        public function resolve() {
            $path = $this->request->getPath();
            $method = $this->request->method();
            $callback = $this->routes[$method][$path] ?? false;
            if ($callback === false) {
                $this->response->setStatusCode(404);
                return $this->renderView('404');
                exit;
            }elseif (is_string($callback)) {
                return $this->renderView($callback);
            }else {
                if (is_array($callback)) {
                    // new instanse of the controller
                    Application::$app->controller = new $callback[0]();
                    $callback[0] = Application::$app->controller;
                }
                return call_user_func($callback, $this->request);
            }
        }
        
        public function renderView($view, $params=[]) {
            $layoutContent = $this->layoutContent();
            $viewContent = $this->renderonlyView($view, $params);
            return str_replace('{{Content}}', $viewContent,$layoutContent);
        }

        protected function layoutContent() {
            $layout = Application::$app->controller->layout;
            ob_start();
            include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
            return ob_get_clean();
        }

        protected function renderonlyView($view, $params) {
            foreach ($params as $key => $value) {
                $$key = $value; 
            }
            ob_start();
            include_once Application::$ROOT_DIR . "/views/$view.php";
            return ob_get_clean();
        } 
    } 