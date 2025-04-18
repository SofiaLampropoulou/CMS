<?php

class ContactController extends Controller{

    function runBeforeAction(){
       // var_dump($_SESSION);
            if ($_SESSION['has_submitted_the_form'] ?? 0 == 1){
             
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();


        $pageObject = new Page($dbc);
        $pageObject->findById(3);
        $variables['pageObject'] = $pageObject;

              
                $template = new Template('default');
                $template -> view('staticPage', $variables);
                //include 'view/contact/contact_us_already_contacted.html';
                return false;
            }
          return true;
        }

    function defaultAction(){
        $variables['title']='';
        $variables['content']='';
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
    
        $pageObject = new Page($dbc);
        $pageObject->findById(5);
        $variables['pageObject'] = $pageObject;

       
      
        $template = new Template('default');
        $template -> view('contact/contact_us', $variables);
}
    function submitContactFormAction(){
     
        //validate
    //store data
    //send email
    $_SESSION['has_submitted_the_form'] = 1;
    $dbh = DatabaseConnection::getInstance();
    $dbc = $dbh->getConnection();


    $pageObject = new Page($dbc);
    $pageObject->findById(4);
    $variables['pageObject'] = $pageObject;
  
    $template = new Template('default');
    $template -> view('staticPage', $variables);
   // include 'view/contact/contact_us_thank_you.html';
}


} 
    

