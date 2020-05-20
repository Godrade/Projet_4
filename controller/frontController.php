<?php

function erreur(){
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
        return $error;
    }
}
function success(){
    if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
        return $success;
    }
}

/* ROUTE */
function homePage(){
    $title = 'Accueil';
    $tabArticles = chapitreHomePage();
    require('view/homeView.php');
}

function loginPage(){
    $error = erreur();
    $success = success();
   
    $title = 'Connexion Administrateur';
    require('view/admin/loginView.php');
}

function adminPage(){
    $error = erreur();
    $success = success();

    $title = 'Administration';
    $user = $_SESSION['user'];
    $tabArticles = chapitreAll();
    $tabCommentaire = getCommentaireReport();
    require('view/admin/adminHome.php');
}