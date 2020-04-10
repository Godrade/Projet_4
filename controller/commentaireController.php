<?php
require('class/commentaireClass.php');
require('model/commentaireManagerModel.php');


function viewCommentaire($id){
    $tabCommentaire = SelectCommentaire($id);
    $title = "Commentaire Numero " . $tabCommentaire['id'] . "";
    require('view/commentaireView.php');
}

function addCommentaire($post){
    $com = new commentaireClass($post);
    $db = new commentaireManagerModel($com);
    $rep = $db->addCommentaire();
    header('Location: ?action=viewarticle&id=' . $post["idArticle"] . '');
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
    return $tab;
}

function reportCommentaire($id){
    $tabCommentaire = SelectCommentaire($id);
    $com = new commentaireClass($tabCommentaire);
    $db = new commentaireManagerModel($com);
    $com->reportCommentaire();
    $db->addReportCommentaire();
    header('Location: ?action=viewarticle&id=' . $tabCommentaire["idArticle"] . '');
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
    header('Location: ?action=admin');
}