<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\core\Request;
    use app\models\User;

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
            $user = new User();
            if ($request->isPost()) {
                $user->loadData($request->getBody());
                if ($user->validate() && $user->save()) {
                    return 'success';
                }else {
                    $this->setLayout('auth');
                    return $this->render('register', [
                        'model' => $user 
                    ]);
                }
            }
            return $this->render('register', [
                'model' => $user 
            ]);
        }
    }
?>