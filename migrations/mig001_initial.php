<?php
    class mig001_initial{
        public function up(){
            $db = \app\core\Application::$app->db;
            $query = "CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                username VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB;";
            $db->pdo->exec($query);
        }

        public function down() {
            $db = \app\core\Application::$app->db;
            $query = "DROP TABLE users;";
            $db->pdo->exec($query);
        }
    }
?>