<?php
require('class/articleClass.php');
require('model/articlesManagerModel.php');



// Front-end
function FullArticlePage(){
    $title = 'Tous les chapitres';
    $tabArticles = chapitreAll();
    require('view/allChapitreView.php');
}

function readSigleArticle($id){
    $tabArticle = getArticle($id);
    if($tabArticle == false){
        header('Location: ?action=home');
    }else{
       $tabCommentaire = getCommentaire($id);
        $title = $tabArticle['name'];
        require('view/ChapitreView.php'); 
    }
}

// Back-end

function addArticle($post){
    $article = new articleClass($post);
    $articleDb = new articlesManagerModel($article);
    if($article->check() == true){
        $articleDb->addArticle();
    }else{
        echo('error');
    }
    header('Location: ?action=admin');
}

function removeArticle($get){
    $article = new articleClass($get);
    $articleDb = new articlesManagerModel($article);
    $articleDel = $articleDb->deleteArticle();
    $delComemmentaire = delCommentaireByArticle($get);
    if($articleDel && $delComemmentaire){
        header('Location: ?action=admin');
    }
}

function editArticle($post){
    $tabArticle = getArticle($post);
    if($tabArticle == false){
        header('Location: ?action=admin');
    }else{
        $data = $tabArticle;
        $title = $data['name'];
        require('view/articleUpdateView.php'); 
    }
}

function updateArticle($post){
    $article = new articleClass($post);
    $articleDb = new articlesManagerModel($article);
    if($article->check() == true){
        $rep = $articleDb->updateArticle();
        if($rep){
            header('Location: ?action=admin');
        }
    }else{
        echo('error');
        header('Location: ?action=home');
    }
}

function chapitreAll(){
    $chapitreDb = new articlesManagerModel();
    $rep = $chapitreDb->chapitreAll();
    return $rep;
}

function chapitreHomePage(){
    $chapitreDb = new articlesManagerModel();
    $tab = $chapitreDb->chapitreHomePage();
    return $tab;
}

function getArticle($id){
    $article = new articleClass($id);
    $articleDb = new articlesManagerModel($article);
    $tab = $articleDb->SelectArticleById();
    $article->checkerById($tab);
    return $tab;
}