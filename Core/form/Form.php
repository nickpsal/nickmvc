<?php
    namespace app\core\form;
    use app\core\model;
    class Form {
        public static function begin($action, $method) {
            echo sprintf('<form action = "%s" method = "%s">', $action, $method);
            return new Form();
        }

        public function field(Model $model, $attribute) {
            return new Field($model,$attribute);
        }

        public static function end() {
            echo '</form>';
        }
    }
?>