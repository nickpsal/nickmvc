<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\core\Request;

    class AuthController extends Controller{
        public function login(Request $request) {
            if ($request->isPost()) {
                echo "Handling submitted data";
            }else {
                echo $this->render('login');
            }
        }

        public function register(Request $request) {
            if ($request->isPost()) {
                echo 'Handlign submitted data';
            }else {
                echo $this->render('register');
            }
        }
    }
?>