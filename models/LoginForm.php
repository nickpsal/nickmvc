<?php
    namespace app\models;

    use app\core\Application;
    use app\core\model;
    use app\core\dbModel;

    class LoginForm extends Model{
        public string $username = '';
        public string $password = '';

        public function rules() :array {
            return [
                'username' => [self::RULE_REQUIRED],
                'password' => [self::RULE_REQUIRED]
            ];
        }

        public function login() {
            $user = User::findOne(['username' => $this->username]);
            if (!$user) {
                $this->errorMessage('username', 'User dont exist with this Username');                 
                return false;
            }
            if (!password_verify($this->password, $user->password)){
                $this->errorMessage('password', 'Wrong Password for the specidfic user');                 
                return false;
            }
             
            return Application::$app->login($user);  
        }
    }
?>