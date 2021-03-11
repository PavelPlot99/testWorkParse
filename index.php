<?
require_once "vendor/autoload.php";
require_once "config/connect.php";
include("Controllers/parseController.php");
\Slim\Slim::registerAutoLoader();

$app = new \Slim\Slim();

$app->get('/parse','parseController::parseHabr');
$app->get('/post/:id','parseController::showPost');
$app->run();

?>
