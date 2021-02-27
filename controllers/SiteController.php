<?php
    namespace app\controllers;
    use app\core\Application;
    use app\core\Controller;
    use app\core\Request;

class SiteController extends Controller{
        public function home(){
            echo $this->render('home');
        }

        public function handleContact(Request $request) {
            $body = $request->getBody();
        }

        public function Contact() {
            echo $this->render('contact');
        }
    }
?>