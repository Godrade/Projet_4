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
        
        $error = erreur();
        $success = success();

        $tabCommentaire = getCommentaire($id);
        $title = $tabArticle['name'];
        require('view/ChapitreView.php'); 
    }
}

// Back-end

function addArticle($post){
    $article = new articleClass($post);
    $articleDb = new articlesManagerModel($article);
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
    unlink($tabArticle[4]);

    if($articleDb->deleteArticle() && delCommentaireByArticle($get)){
        $_SESSION['success'] = "L'article N° " . $tabArticle['id'] . " & les commentaires ont bien été supprimé !";
    }else{
        $_SESSION['error'] = "Une erreur est survenue, si le problème persiste merci de contacter un administrateur du site !";
    }
    header('Location: ?action=admin#articleReport');
}

function editArticle($post){
    $tabArticle = getArticle($post);

    $error = erreur();
    $success = success();

    if($tabArticle != false){
        $data = $tabArticle;
        $title = $data['name'];
        require('view/articleUpdateView.php');
    }else{
        $_SESSION['error'] = "Une erreur est survenue, si le problème persiste merci de contacter un administrateur du site !";
        header('Location: ?action=admin');
    }

}

function updateArticle($post){
    $article = new articleClass($post);
    $articleDb = new articlesManagerModel($article);
    $article->uploadFiles();
    if($article->check()){
        if($articleDb->updateArticle()){
            $_SESSION['success'] = "Votre article a bien été édité";
            header('Location: ?action=admin');
        }else{
            $_SESSION['error'] = "Une erreur est survenue, si le problème persiste merci de contacter un administrateur du site !";
            header('Location: ?action=admin');
        }
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