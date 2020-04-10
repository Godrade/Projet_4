<?php

/* ROUTE */
function HomePage(){
    $title = 'Accueil';
    $tabArticles = chapitreHomePage();
    require('view/homeView.php');
}

function LoginPage(){
    $title = 'Connexion Administrateur';
    require('view/loginView.php');
}

function AdminPage(){
    $title = 'Administration';
    $user = $_SESSION['user'];
    $tabArticles = chapitreAll();
    $tabCommentaire = getCommentaireReport();
    require('view/adminHome.php');
}