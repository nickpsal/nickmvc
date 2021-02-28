<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\core\Request;
    use app\models\RegisterModel;

    class AuthController extends Controller{
        public array $errors  = [];
        public function login(Request $request) {
            if ($request->isPost()) {
                return 'Handlign submitted data';
            }else {
                $this->setLayout('auth');
                return $this->render('login');
            }
        }

        public function register(Request $request) {
            $registerModel = new RegisterModel();
            if ($request->isPost()) {
                $registerModel->loadData($request->getBody());
                if ($registerModel->validate() && $registerModel->register()) {
                    return 'success';
                }else {
                    $this->setLayout('auth');
                    return $this->render('register', [
                        'model' => $registerModel 
                    ]);
                }
            }
            return $this->render('register', [
                'model' => $registerModel 
            ]);
        }
    }
?>