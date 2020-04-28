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
        
        if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
            $success = $_SESSION['success'];
            unset($_SESSION['success']);
        }

        $tabCommentaire = getCommentaire($id);
        $title = $tabArticle['name'];
        require('view/ChapitreView.php'); 
    }
}

// Back-end

function addArticle($post){
    $article = new articleClass($post);
    $articleDb = new articlesManagerModel($article);
    var_dump($article);
    var_dump($_FILES);
    if($article->check()){
        $article->uploadFiles($post);
        if($articleDb->addArticle()){
            $_SESSION['success'] = "Votre article à été ajouté !";
        }else{
            $_SESSION['error'] = "Une erreur est survenue, si le problème persiste merci de contacter un administrateur du site !";
        }
    }
    header('Location: ?action=admin');
}

function removeArticle($get){
    $article = new articleClass($get);
    $articleDb = new articlesManagerModel($article);
    $tabArticle = getArticle($get);
    $articleDel = $articleDb->deleteArticle();
    unlink($tabArticle[4]);
    $delComemmentaire = delCommentaireByArticle($get);
    if($articleDel && $delComemmentaire){
        header('Location: ?action=admin#articleReport');
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