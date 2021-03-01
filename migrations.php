<?php
    require_once __DIR__ . "/vendor/autoload.php";
    use app\core\Application;
    
    //load the env config
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    $config = [
        'db' => [
           'dsn' => $_ENV['DB_DSN'],
           'username' => $_ENV['DB_USER'],
           'password' => $_ENV['DB_PASSWORD'],
        ]
    ];

    
    $app = new Application(__DIR__, $config);

    $app->db->apply_Migrations();

?> 