<?php

require('class/connexionClass.php');
require('model/connexionManagerModel.php');


function connexionLogin($post){
    $ObjetUser = new connexionClass($post);
    $dbuser = new connexionManagerModel($ObjetUser);
}

//SESSION DESTROY
function desrtoySessionUser(){
    session_start();
    if(session_destroy()){
      header("Location: index.php?action=login");
    }
  }

  //SESSION CHECK
  function checkSessionUser(){
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: index.php?action=login");
        exit();   
    }
  }