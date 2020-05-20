<?php

session_start();
require('class/connexionClass.php');
require('model/connexionManagerModel.php');

function connexionLogin($post){
  
  $ObjetUser = new connexionClass($post);
  $dbuser = new connexionManagerModel($ObjetUser);

  $reponse = $dbuser->selectUser();

  $ObjetUser->setObjectAccount($reponse);
  $reponseConnexion = $ObjetUser->verifyConnection();
  

  if($reponseConnexion){
    $ObjetUser->connectionUser();
    header('Location: ?action=admin');
  }else{
    header('Location: ?action=login');
  }

}

//SESSION DESTROY
function desrtoySessionUser(){
  $ObjetUser = new connexionClass($_SESSION["user"]);
  $ObjetUser->desrtoySessionUser();

  if($ObjetUser->desrtoySessionUser()){
    header("Location: index.php?action=login");
  }

}

  //SESSION CHECK
function checkSessionUser(){
  $ObjetUser = new connexionClass();
  $reponseConnect = $ObjetUser->checkConnect();

  if(!$reponseConnect){
    header("Location: index.php?action=login");
  } 
  
}