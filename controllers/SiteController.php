<?php
    namespace app\controllers;
    use app\core\Application;
    use app\core\Controller;
    use app\core\Request;

class SiteController extends Controller{
        public function home(){
            $params = [
                'title' => 'HomePage'
            ];
            echo $this->render('home', $params);
        }

        public function handleContact(Request $request) {
            $body = $request->getBody();
        }

        public function Contact() {
            $params = [
                'title' => 'Contact Page'
            ];
            echo $this->render('contact',$params);
        }
    }
?>