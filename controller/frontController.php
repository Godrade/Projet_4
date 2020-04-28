<?php

/* ROUTE */
function HomePage(){
    $title = 'Accueil';
    $tabArticles = chapitreHomePage();
    require('view/homeView.php');
}

function LoginPage(){
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    $title = 'Connexion Administrateur';
    require('view/loginView.php');
}

function AdminPage(){
    $title = 'Administration';
    $user = $_SESSION['user'];
    $tabArticles = chapitreAll();
    $tabCommentaire = getCommentaireReport();
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    require('view/adminHome.php');
}