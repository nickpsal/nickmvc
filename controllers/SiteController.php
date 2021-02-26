<?php
    namespace app\controllers;
    use app\core\Application;
    use app\core\Controller;
    use app\core\Request;

class SiteController extends Controller{
        public function home(){
            $params = [
                'name' => 'nickpsal'
            ];
            echo $this->render('home', $params);
        }

        public function handleContact(Request $request) {
            $body = $request->getBody();
            var_dump($body);
            die();
        }

        public function Contact() {
            echo $this->render('contact');
        }
    }
?>