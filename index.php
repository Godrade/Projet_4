<?php

require('model/dbManager.php');
require('controller/frontController.php');
require('controller/connexionController.php');

// SWITCH PAGE //
if(!empty($_GET['action'])){
    switch($_GET['action']){
        case 'home':
            HomePage();
       break;
       case 'allarticle':
            FullArticlePage();
       break;
       case 'article':
            ArticlePage();
       break;
       case 'login':
           LoginPage();
       break;
       case 'connexionlogin':
            connexionLogin($_POST);
        break;
        case 'admin':
            session_start();
            AdminPage();
        break;
        case 'logout':
            desrtoySessionUser();
        break;
       default: 
           DefaultPage();
   }
}else{
    DefaultPage();
}
 