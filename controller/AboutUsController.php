<?php
class AboutUsController extends Controller{
    function defaultAction(){  
     
       

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();


        $pageObject = new Page($dbc);
        $pageObject->findById(2);
        $variables['pageObject'] = $pageObject;

        $template = new Template('default');
        $template -> view('staticPage', $variables);
       // include 'view/aboutUs.html';
    }
   
      
    }

