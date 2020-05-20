<?php
date_default_timezone_set('Europe/Paris');
require('model/dbManager.php');
require('controller/frontController.php');
require('controller/connexionController.php');
require('controller/articlesController.php');
require('controller/commentaireController.php');


// SWITCH PAGE //
if(!empty($_GET['action'])){
    switch($_GET['action']){
        case 'home':
            homePage();
        break;
        case 'allarticle':
            FullArticlePage();
        break;
        case 'login':
           loginPage();
        break;
        case 'connexionlogin':
            connexionLogin($_POST);
        break;
        case 'admin':
            checkSessionUser();
            adminPage();
        break;
        case 'logout':
            desrtoySessionUser();
        break;
        case 'addarticle':
            checkSessionUser();
            addArticle($_POST);
        break;
        case 'updatearticle':
            checkSessionUser();
            updateArticle($_POST);
        break;
        case 'delarticle':
            checkSessionUser();
            removeArticle($_GET);
        break;
        case 'editarticle':
            checkSessionUser();
            editArticle($_GET);
        break;
        case 'addCommentaire':
            addCommentaire($_POST);
        break;
        case 'viewarticle':
            readSigleArticle($_GET);
        break;
        case 'signalCommentaire':
            reportCommentaire($_GET);
        break;
        case 'resetReport':
            checkSessionUser();
            resetReport($_GET);
        break;
        case 'delCommentaire':
            checkSessionUser();
            delCommentaire($_GET);
        break;
        case 'viewCommentaire':
            checkSessionUser();
            viewCommentaire($_GET);
        break;
        default:
            homePage();
    }
    }else{
        homePage();
}
