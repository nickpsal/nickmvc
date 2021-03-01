<?php
    require_once __DIR__ . "/../vendor/autoload.php";
    use app\controllers\AuthController;
    use app\controllers\SiteController;
    use app\core\Application;
    
    //load the env config
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
    
    $config = [
        'db' => [
           'dsn' => $_ENV['DB_DSN'],
           'username' => $_ENV['DB_USER'],
           'password' => $_ENV['DB_PASSWORD'],
        ]
    ];

    
    $app = new Application(dirname(__DIR__), $config);

    $app->router->get('/', [SiteController::class,'home']);
    $app->router->get('/contact', [SiteController::class,'Contact']);

    $app->router->get('/login',[AuthController::class,'login']);
    $app->router->get('/register',[AuthController::class,'register']);

    $app->router->post('/login',[AuthController::class,'login']);
    $app->router->post('/register',[AuthController::class,'register']);

    $app->router->post('/contact', [SiteController::class,'handleContact']);

    $app->run();

?>