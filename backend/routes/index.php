<?php 

use Slim\Factory\AppFactory;
use Slim\Middleware\BodyParsingMiddleware;
use App\Controller\ClienteController;
use Slim\Middleware\CorsMiddleware;

require "../vendor/autoload.php";


header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');

header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');


$app = AppFactory::create();

$app->addBodyParsingMiddleware();

$app->AddErrorMiddleware(true,true,true);

$app->get('/clientes', ClienteController::class . ':getClientes');    
$app->get('/cliente/{id}', ClienteController::class . ':getCliente');                            
$app->post('/inserir', ClienteController::class . ':insertCliente');
$app->put('/update/{id}', ClienteController::class . ':updateCliente');
$app->delete('/delete/{id}', ClienteController::class . ':deleteCliente');

$app->run();