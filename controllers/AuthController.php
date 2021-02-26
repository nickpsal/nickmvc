<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\core\Request;

    class AuthController extends Controller{
        public function login(Request $request) {
            if ($request->isPost()) {
                echo "Handling submitted data";
            }else {
                $params = [
                    'title' => 'Login Page'
                ];
                echo $this->render('login',$params);
            }
        }

        public function register(Request $request) {
            if ($request->isPost()) {
                echo 'Handlign submitted data';
            }else {
                $params = [
                    'title' => 'Register Page'
                ];
                echo $this->render('register',$params);
            }
        }
    }
?>