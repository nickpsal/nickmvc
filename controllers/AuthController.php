<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\core\Request;
    use app\models\RegisterModel;

    class AuthController extends Controller{
        public array $errors  = [];
        public function login(Request $request) {
            if ($request->isPost()) {
                echo 'Handlign submitted data';
            }else {
                $this->setLayout('auth');
                echo $this->render('login');
            }
        }

        public function register(Request $request) {
            if ($request->isPost()) {
                $registerModel = new RegisterModel();
                $registerModel->loadData($request->getBody());
                if ($registerModel->validate() && $registerModel->register()) {
                }else {
                    return 'success';
                    return $this->render('register', [
                        'model' => $registerModel 
                    ]);
                }
            }else {
                $this->setLayout('auth');
                echo $this->render('register');
            }
        }
    }
?>