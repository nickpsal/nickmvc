<?php
    namespace app\core\form;
    use app\core\model;

    class Field {
        public const TYPE_TEXT  = 'text';
        public const TYPE_PASSWORD  = 'password';
        public const TYPE_NUMBER  = 'number';

        public Model $model;
        public String $attribute;
        public String $type;

        public function __construct(Model $model, String $attribute){
            $this->model = $model;
            $this->attribute = $attribute;
            $this->type = SELF::TYPE_TEXT;
        }

        public function __toString(){
            return sprintf('
                <div class="form-group">
                    <label>%s</label>
                    <input type="%s" name = "%s" value = "%s" class="form-control%s">
                    <div class="invalid-feedback">
                          %s
                    </div>
                </div>',
                $this->attribute,
                $this->type,
                $this->attribute,
                $this->model->{$this->attribute},
                $this->model->hasError($this->attribute) ? ' is-invalid' : '',
                $this->model->getFirstError($this->attribute)
            );
        }

        public function passwordField() {
            $this->type = self::TYPE_PASSWORD;
            return $this; 
        }
    }
?>