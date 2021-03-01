<?php
    namespace app\core;
    class Database {
        public \PDO $pdo;
        public function __construct(array $config){
            $dsn = $config['dsn'] ?? '' ;
            $user = $config['username'] ?? '' ;
            $password = $config['password'] ?? '' ;
            $this->pdo = new \PDO($dsn, $user, $password);
            //we need this so thw pdo throws any error presented
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
        } 
    }
?> 