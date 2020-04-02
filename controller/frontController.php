<?php

/* ROUTE */
function HomePage(){
    $user = $_SESSION['user'];
    $title = 'Accueil';
    $tabArticles = chapitreHomePage();
    require('view/homeView.php');
}

function LoginPage(){
    $user = $_SESSION['user'];
    $title = 'Connexion Administrateur';
    require('view/loginView.php');
}

function AdminPage(){
    $title = 'Administration';
    $user = $_SESSION['user'];
    $tabArticles = chapitreAll();
    require('view/adminHome.php');
}