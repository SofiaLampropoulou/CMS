<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'source/Controller.php';
require_once ROOT_PATH . 'source/Template.php';
require_once ROOT_PATH . 'source/DatabaseConnection.php';
require_once ROOT_PATH . 'model/Page.php';
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
$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

if($section=='about_us'){
include ROOT_PATH . 'controller/AboutUsController.php';
$aboutController = new AboutUsController();
$aboutController->runAction($action);

}
else if ($section=='contact'){
include ROOT_PATH . 'controller/contactPage.php';
$contactController = new ContactController();

$contactController->runAction($action);

}

else{
include ROOT_PATH . 'controller/homePage.php';
$homePageController = new HomePageController();
$homePageController -> runAction($action);
}