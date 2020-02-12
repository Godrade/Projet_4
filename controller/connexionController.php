<?php

require('class/connexionClass.php');
require('class/sessionClass.php');
require('model/connexionManagerModel.php');


function connexionLogin($post){
    $ObjetUser = new connexionClass($post);
    $dbuser = new connexionManagerModel($ObjetUser);


    //Session
    $sessionUser = new sessionClass($ObjetUser);
    $sessionUser->getStartSession();

}