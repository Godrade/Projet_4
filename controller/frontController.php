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
function HomePage(){
    $title = 'Accueil';
    $tabArticles = chapitreHomePage();
    require('view/homeView.php');
}

function LoginPage(){
    $error = erreur();
    $success = success();
   
    $title = 'Connexion Administrateur';
    require('view/loginView.php');
}

function AdminPage(){
    $error = erreur();
    $success = success();

    $title = 'Administration';
    $user = $_SESSION['user'];
    $tabArticles = chapitreAll();
    $tabCommentaire = getCommentaireReport();
    require('view/adminHome.php');
}