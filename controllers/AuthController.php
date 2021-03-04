<?php
    namespace app\controllers;

    use app\core\Application;
    use app\core\Controller;
    use app\core\Request;
    use app\core\Response;
    use app\models\User;
    use app\models\LoginForm;

    class AuthController extends Controller{
        public array $errors  = [];
        public function login(Request $request, Response $response) {
            $user = new User();
            $loginform = new LoginForm();
            if ($request->isPost()) {
                $loginform->loadData($request->getBody());
                if ($loginform->validate() && $loginform->login()) {
                    $response->redirect('/');
                    return;
                } 
            }
            $this->setLayout('auth');
            return $this->render('register');
        }

        public function register(Request $request) {
            $user = new User();
            if ($request->isPost()) {
                $user->loadData($request->getBody());
                if ($user->validate() && $user->save()) {
                    Application::$app->session->setFlash('success', 'thanks for registered');
                    Application::$app->response->redirect('/');
                    exit;
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