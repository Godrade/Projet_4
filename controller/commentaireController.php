<?php
require('class/commentaireClass.php');
require('model/commentaireManagerModel.php');


function viewCommentaire($id){
    $tabCommentaire = SelectCommentaire($id);
    if($tabCommentaire == false){
        header('Location: ?action=admin');
    }else{
      $title = "Commentaire Numero " . $tabCommentaire['id'] . "";
        require('view/admin/commentaireView.php');  
    }   
}

function addCommentaire($post){
    $com = new commentaireClass($post);
    $db = new commentaireManagerModel($com);
    if($com->check() == true){
        if($rep = $db->addCommentaire()){
            $_SESSION['success'] = 'Votre commentaire a été ajouté';
        }else{
            $_SESSION['error'] = "Une erreur est survenue, si le problème persiste merci de contacter un administrateur du site !";
        }
    }else{
        $_SESSION['error'] = "Erreur : Votre commentaire n'as pas pu être ajouté !";
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
    if($db->addReportCommentaire()){
        $_SESSION['success'] = 'Votre signalement a bien été transmit !';
    }else{
        $_SESSION['error'] = "Une erreur est survenue, si le problème persiste merci de contacter un administrateur du site !";
    }
    header('Location: ?action=viewarticle&id=' . $tabCommentaire["idArticle"] . '#commentaire');
}

function resetReport($id){
    $tabCommentaire = SelectCommentaire($id);
    $com = new commentaireClass($tabCommentaire);
    $db = new commentaireManagerModel($com);
    $com->resetReport();
    if($db->resetReport()){
        $_SESSION['success'] = "Les reports du commentaire N° " . $tabCommentaire['id'] . " On bien été reset";
    }else{
        $_SESSION['error'] = "Une erreur est survenue, si le problème persiste merci de contacter un administrateur du site !";
    }
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
    if($db->deleteCommentaire()){
        $_SESSION['success'] = "Le commentaire N° " . $tabCommentaire['id'] . " à bien été supprimé";
    }else{
        $_SESSION['error'] = "Une erreur est survenue, si le problème persiste merci de contacter un administrateur du site !";
    }
    header('Location: ?action=admin#articleReport');
}

function delCommentaireByArticle($id){
    $com = new commentaireClass($id);
    $db = new commentaireManagerModel($com);
    $tab = $db->deleteCommentaireByArticle();
    return $tab;
}