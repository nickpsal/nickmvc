<?php
    namespace app\models;
    use app\core\Application;
    use app\core\Model;
    use app\core\dbModel;
    
    class User extends dbModel{
        const STATUS_INACTIVE = 0;
        const STATUS_ACTIVE = 1;
        const STATUS_DELETED = 2;
        public string $firstName = '';
        public string $LastName = '';
        public int $status = self::STATUS_INACTIVE;
        public string $email = '';
        public string $username = '';
        public string $password = '';
        public string $confirm_password = '';

        public function save() {
            $this->status = self::STATUS_INACTIVE;
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            return parent::save();
        } 

        public function tablename(): string{
            return 'users';
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

        public function attributes(): array {
            return [
                'email', 'firstName', 'LastName', 'username' , 'password', 'status' 
            ];
        }
    }
?>