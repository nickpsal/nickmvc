<?php
    namespace app\core;
    class Database {
        public \PDO $pdo;
        public array $newMigrations = [];
        public function __construct(array $config){
            $dsn = $config['dsn'] ?? '' ;
            $user = $config['username'] ?? '' ;
            $password = $config['password'] ?? '' ;
            $this->pdo = new \PDO($dsn, $user, $password);
            //we need this so the pdo throws any error presented
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
        } 

        public function apply_Migrations() {
            $this->createMigrationsTable();
            $appliedMigrations = $this->getAppliedMigrations();   
            $files = scandir(Application::$ROOT_DIR.'/migrations');
            $toApplyMigrations = array_diff($files, $appliedMigrations);
            foreach ($toApplyMigrations as $migration) {
                if ($migration === '.' || $migration === '..') {
                    continue;
                }
                require_once Application::$ROOT_DIR . '/migrations/' . $migration;
                $classname = pathinfo($migration,PATHINFO_FILENAME);
                $instance = new $classname();
                $this->log("Applying migration $migration");
                $instance->up();
                $this->log("Migration $migration ended succefully");
                $newMigrations[] = $migration;
            }
            if (!empty($newMigrations)) {
                $this->saveMigrations($newMigrations);
            }else {
                $this->log("All Migrations are applied");
            }
        }

        public function createMigrationsTable() {
            $query = "CREATE TABLE IF NOT EXISTS migrations(
                id INT(6) AUTO_INCREMENT PRIMARY KEY,
                migration VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB;";
            $this->pdo->exec($query);
        }

        public function getAppliedMigrations() {
            $query = "SELECT migration FROM migrations";
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_COLUMN);
        }

        public function saveMigrations(array $migrations) {
            $str = implode(",",array_map(fn($m) => "('$m')", $migrations));
            $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $str");
            $statement->execute();
        }

        protected function log($message) {
            echo '[' . date('d-M-Y H:i:s'). '] - ' . $message . PHP_EOL;
        }
    }
?> 