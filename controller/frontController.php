<?php

/* ROUTE */
function DefaultPage(){
    $title = 'Accueil';
    require('view/homeView.php');
}

function HomePage(){
    $title = 'Accueil';
    require('view/homeView.php');
}

function FullArticlePage(){
    $title = 'Tous les chapitres';
    require('view/allChapitreView.php');
}

function ArticlePage(){
    $title = 'Chapitre #1';
    require('view/ChapitreView.php');
}

function LoginPage(){
    $title = 'Connexion Administrateur';
    require('view/loginView.php');
}

function AdminPage(){
    $title = 'Administration';
    require('view/adminHome.php');
}

function Logout(){
}