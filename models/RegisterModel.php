<?php
    namespace app\models;
    use app\core\model;
    class RegisterModel extends model{
        public string $firstName;
        public string $LastName;
        public string $email;
        public string $username;
        public string $password;
        public string $confirm_password;
        
        public function register() {
            echo "creating new user";
        } 

        public function rules(): array {
            return [
                'firstName' => [self::RULE_REQUIRED],
                'LastName' => [self::RULE_REQUIRED],
                'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
                'username' => [self::RULE_REQUIRED],
                'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8],[self::RULE_MAX, 'max' => 24]],
                'confirm_password' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
            ];
        }
    }
?>