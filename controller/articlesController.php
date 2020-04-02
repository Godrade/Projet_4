<?php
require('class/articleClass.php');
require('model/articlesManagerModel.php');



// Front-end
function FullArticlePage(){
    $user = $_SESSION['user'];
    $title = 'Tous les chapitres';
    $tabArticles = chapitreAll();
    require('view/allChapitreView.php');
}

function readSigleArticle($id){
    $user = $_SESSION['user'];
    $article = new articleClass($id);
    $articleDb = new articlesManagerModel($article);
    $rep = $articleDb->SelectArticleById();
    $articleReturn = $rep;
    $title = $articleReturn['name'];
    require('view/ChapitreView.php');
}

// Back-end

function addArticle($post){
    $user = $_SESSION['user'];
    $article = new articleClass($post);
    $articleDb = new articlesManagerModel($article);
    $rep = $articleDb->addArticle();

    if($rep){
        header('Location: ?action=admin');
    }
}

function removeArticle($get){
    $article = new articleClass($get);
    $articleDb = new articlesManagerModel($article);
    $rep = $articleDb->deleteArticle();
    if($rep){
        header('Location: ?action=admin');
    }
}

function editArticle($post){
    $user = $_SESSION['user'];
    $article = new articleClass($post);
    $articleDb = new articlesManagerModel($article);
    $rep = $articleDb->SelectArticleById();
    $data = $rep;
    $title = $rep['name'];
    require('view/articleUpdateView.php');
}

function updateArticle($post){
    $article = new articleClass($post);
    $articleDb = new articlesManagerModel($article);
    $rep = $articleDb->updateArticle();
    if($rep){
        header('Location: ?action=admin');
    }
}

function chapitreAll(){
    $chapitreDb = new articlesManagerModel();
    $rep = $chapitreDb->chapitreAll();
    return $rep;
}

function chapitreHomePage(){
    $chapitreDb = new articlesManagerModel();
    $tabArticles = $chapitreDb->chapitreHomePage();
    return $tabArticles;
}