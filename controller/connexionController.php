<?php

require('class/connexionClass.php');
require('model/connexionManagerModel.php');


function connexionLogin($post){
  
    $ObjetUser = new connexionClass($post);
    $dbuser = new connexionManagerModel($ObjetUser);

    $reponse = $dbuser->connexionUser();

    //var_dump($reponse);

    $ObjetUser->setObjectAccount($reponse);
    $reponseConnexion = $ObjetUser->verifyConnection();

    // exit();
    
    if($reponseConnexion){
      // AdminPage();
      header('Location: ?action=admin');
    }else{
      LoginPage();
    }

}

//SESSION DESTROY
function desrtoySessionUser(){
  session_start();
  var_dump($_SESSION);

  $ObjetUser = new connexionClass($_SESSION["user"]);
  $ObjetUser->desrtoySessionUser();

  }

  //SESSION CHECK
  function checkSessionUser(){
    // session_start();
    if(!isset($_SESSION["username"])){
        header("Location: index.php?action=login");
        exit();   
    }
  }