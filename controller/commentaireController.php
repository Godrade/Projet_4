<?php
require('class/commentaireClass.php');
require('model/commentaireManagerModel.php');


function viewCommentaire($id){
    $tabCommentaire = SelectCommentaire($id);
    if($tabCommentaire == false){
        header('Location: ?action=admin');
    }else{
      $title = "Commentaire Numero " . $tabCommentaire['id'] . "";
        require('view/commentaireView.php');  
    }   
}

function addCommentaire($post){
    $com = new commentaireClass($post);
    $db = new commentaireManagerModel($com);
    if($com->check() == true){
        $rep = $db->addCommentaire();
        $_SESSION['success'] = true;
    }else{
        $_SESSION['showError'] = true;
        $_SESSION['error'] = array("Erreur : Votre commentaire n'as pas pu être ajouté !");
    }
    header('Location: ?action=viewarticle&id=' . $post["idArticle"] . '#commentaire');
}

function getCommentaire($id){
    $com = new commentaireClass($id);
    $db = new commentaireManagerModel($com);
    $tab = $db->getCommentaireById();
    return $tab;
}

function SelectCommentaire($id){
    $com = new commentaireClass($id);
    $db = new commentaireManagerModel($com);
    $tab = $db->SelectCommentaireById();
    $com->checkComment($tab);
    return $tab;
}

function reportCommentaire($id){
    $tabCommentaire = SelectCommentaire($id);
    $com = new commentaireClass($tabCommentaire);
    $db = new commentaireManagerModel($com);
    $com->reportCommentaire();
    $db->addReportCommentaire();
    header('Location: ?action=viewarticle&id=' . $tabCommentaire["idArticle"] . '#commentaire');
}

function resetReport($id){
    $tabCommentaire = SelectCommentaire($id);
    $com = new commentaireClass($tabCommentaire);
    $db = new commentaireManagerModel($com);
    $com->resetReport();
    $db->resetReport();
    header('Location: ?action=admin#articleReport');
}

function getCommentaireReport(){
    $db = new commentaireManagerModel();
    $tab = $db->getReportCommentaire();
    return $tab;
}

function delCommentaire($id){
    $com = new commentaireClass($id);
    $db = new commentaireManagerModel($com);
    $tab = $db->deleteCommentaire();
    header('Location: ?action=admin#articleReport');
}

function delCommentaireByArticle($id){
    $com = new commentaireClass($id);
    $db = new commentaireManagerModel($com);
    $tab = $db->deleteCommentaireByArticle();
    return $tab;
}