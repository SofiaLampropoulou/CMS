<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);
define('MODULE_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'source/Controller.php';
require_once ROOT_PATH . 'source/Template.php';
require_once ROOT_PATH . 'source/Router.php';
require_once ROOT_PATH . 'source/Entity.php';
require_once ROOT_PATH . 'source/DatabaseConnection.php';
require_once MODULE_PATH . 'page/models/Page.php';
//BOOTSRAP
//Connect to a Mysql database usinhg driver invocation
DatabaseConnection::connect('localhost','darwin_cms', 'root', '');
/*$dsn = '';
$user = 'root';
$password = '';

try{
$dbh = 
    }
catch(PDOException $e){
echo 'Connected failed: ' . $e->getMessage();
die();
    }*/

//if / else logic
//$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
//$action = $_GET['action'] ?? $_POST['action'] ?? 'default';
//Routing
$action = $_GET['seo_name'] ?? 'home';



$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();
$router = new Router($dbc);
$router->findBy('pretty_url',$action);

$action = $router->action != '' ? $router->action : 'default';
$moduleName = ucfirst($router->module) . 'Controller';

$controllerFile = MODULE_PATH . $router->module . '/controllers /' . $moduleName . '.php';
if(file_exists($controllerFile)){
    include $controllerFile;
    $controller = new $moduleName();
    $controller->setEntityId($router->entity_id);
    $controller->runAction($action);
}

/*if($router->module=='page'){
include ROOT_PATH . 'controller/PageController.php';
$pageController = new PageController();
$pageController->setEntityId($router->entity_id);
$pageController->runAction($action);

}
else if ($section=='contact'){
include ROOT_PATH . 'controller/contactPage.php';
$contactController = new ContactController();

$contactController->runAction($action);

}*/
