<?php
    namespace app\core;
    use app\core\model;
    use app\models\User;

    abstract class dbModel extends Model{
        abstract public function tablename():string;

        abstract public function attributes():array;

        public function save() {
            $tableName = $this->tablename();
            $attributes = $this->attributes();
            $params = array_map(fn($aattr) => ":$aattr", $attributes);
            $query = self::prepare("INSERT INTO $tableName (".implode(',',$attributes).") VALUES(".implode(',',$params).")");
            foreach ($attributes as $attribute) {
                $query->bindValue(":$attribute" , $this->{$attribute});
            }
            $query->execute();
            return true;
        }

        public static function prepare($sql) {
            return Application::$app->db->pdo->prepare($sql);
        }

        public static function findOne($where) {   

        }
    }
?>