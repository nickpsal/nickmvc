<?php
    namespace app\core;
    
    abstract class model {
        public const RULE_REQUIRED = 'required';
        public const RULE_EMAIL = 'email';
        public const RULE_MIN = 'min';
        public const RULE_MAX = 'max';
        public const RULE_MATCH = 'match';

        public function loadData($data) {
            foreach ($data as $key => $value) {
                if (property_exists($this,$key)){
                    $this->{$key} = $value;
                    
                }
            }
        }

        abstract public function rules():array;

        public array $errors = [];

        public function validate() {
            foreach($this->rules() as $attribute => $rules) {
                $value = $this->{$attribute};
                foreach ($rules as $rule) {
                    $rulename = $rule;
                    if (!is_string($rulename)) {
                        $rulename = $rule[0];
                    }
                    if ($rulename === self::RULE_REQUIRED && !$value) {
                       $this->addError($attribute, self::RULE_REQUIRED); 
                    }
                }
            }
            return empty($this->errors);  
        }

        public function addError(string $attribute, string $rule) {
            $this->errors[$attribute][] = $this->errorMessages()[$rule] ?? '';
        }

        public function errorMessages() {
            return [
                self::RULE_REQUIRED => 'This field is required',
                self::RULE_EMAIL => 'This field must be a valid email address',
                self::RULE_MIN => 'Min length of this field must be {min}',
                self::RULE_MAX => 'Max length of this field must be {max}',
                self::RULE_MATCH => 'This field must be the same as {match}'
            ];
        }
    }
?>