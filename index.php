<?
require_once "vendor/autoload.php";
require_once "config/connect.php";
require_once "autoload.php";
\Slim\Slim::registerAutoLoader();

$app = new \Slim\Slim();
$app->get('/','parseController::show');
$app->get('/parse','parseController::parseHabr');
$app->get('/post','parseController::showPosts');
$app->get('/post/:id','parseController::showPost');
$app->run();

?>
