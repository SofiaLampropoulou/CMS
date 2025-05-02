<?php
class PageController extends Controller{
    function defaultAction(){  
     
       

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();


        $pageObject = new Page($dbc);
        $pageObject->findBy('id', $this->entityId);
        $variables['pageObject'] = $pageObject;

        $template = new Template('default');
        $template -> view('page/views/staticPage', $variables);
       // include 'view/aboutUs.html';
    }
   
      
    }

