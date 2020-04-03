<?php
require('model/dbManager.php');
require('controller/frontController.php');
require('controller/connexionController.php');
require('controller/articlesController.php');



// SWITCH PAGE //
if(!empty($_GET['action'])){
    switch($_GET['action']){
        case 'home':
            HomePage();
        break;
        case 'allarticle':
            FullArticlePage();
        break;
        case 'article':
            ArticlePage();
        break;
        case 'login':
           LoginPage();
        break;
        case 'connexionlogin':
            connexionLogin($_POST);
        break;
        case 'admin':
            checkSessionUser();
            AdminPage();
        break;
        case 'logout':
            desrtoySessionUser();
        break;
        case 'addarticle':
            addArticle($_POST);
        break;
        case 'updatearticle':
            updateArticle($_POST);
        break;
        case 'delarticle':
            removeArticle($_GET);
        break;
        case 'editarticle':
            editArticle($_GET);
        break;
        case 'addCommentaire':
            addCommentaire($_POST);
        break;
        case 'viewarticle':
            readSigleArticle($_GET);
        break;
        default:
            HomePage();
    }
    }else{
        HomePage();
}
