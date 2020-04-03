<?php

class articlesManagerModel{

    private $_db;
    private $_object;

    public function __construct($post = false){
      if($post != false && isset($post)){
        $this->_object = $post;
       }
      $this->_db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
      date_default_timezone_set('Europe/Paris');
    }

    public function addArticle(){
      $requete = $this->_db->prepare("INSERT INTO article (`name`, `creation_date`, `content`, `image`) VALUES (:name, :creation_date, :content, :image)");
      $requete->bindValue("name", $this->_object->getTitle());
      $requete->bindValue("creation_date", date("Y-m-d H:i:s"));
      $requete->bindValue("content", $this->_object->getContent());
      $requete->bindValue("image", $this->_object->getImage());
      $requete->execute();
      $chapitre = $requete->fetchAll();
      return $this->_object;
    }

    //Update = Retrun tableau
    public function updateArticle(){
      $requete = $this->_db->prepare("UPDATE article SET name = :name, content = :content, image = :image WHERE id = :id");
      $requete->bindValue("name", $this->_object->getTitle());
      $requete->bindValue("content", $this->_object->getContent());
      $requete->bindValue("image", $this->_object->getImage());
      $requete->bindValue("id", $this->_object->getId());
      $requete->execute();
      $chapitre = $requete;
      return $chapitre;
    }

    //Deleted = Retrun tableau
    public function deleteArticle(){
      $requete = $this->_db->prepare("DELETE FROM article WHERE id = :id");
      $requete->bindValue("id", $this->_object->getId());
      $requete->execute();
      $chapitre = $requete;
      return $chapitre;
    }

    //SelectALL = Retrun tableau
    public function chapitreAll(){
      $requete = $this->_db->prepare("SELECT * FROM article ORDER BY id ASC");
      $requete->execute();
      $tabArticles = $requete->fetchAll();
      return $tabArticles;
  }

    //SelectALL = Retrun tableau
    public function chapitreHomePage(){
      $requete = $this->_db->prepare("SELECT * FROM article ORDER BY id ASC LIMIT 6");
      $requete->execute();
      $article = $requete->fetchAll();
      return $article;
  }

    //SelecteById = Retrun tableau
    public function SelectArticleById(){
      $requete = $this->_db->prepare("SELECT * FROM article WHERE id = :id");
      $requete->bindValue("id", $this->_object->getId());
      $requete->execute();
      $chapitre = $requete->fetch(PDO::FETCH_ASSOC);
      return $chapitre;
    }

    public function addCommentaire(){
      $requete = $this->_db->prepare("INSERT INTO comment (`idArticle`, `creation_date`, `content`, `name`) VALUES (:idArticle, :creation_date, :content, :name)");
      $requete->bindValue("idArticle", $this->_object->getIdArticle());
      $requete->bindValue("name", $this->_object->getUserName());
      $requete->bindValue("creation_date", date("Y-m-d H:i:s"));
      $requete->bindValue("content", $this->_object->getContent());
      $requete->execute();
      $chapitre = $requete->fetchAll();
      return $this->_object;
    }

    public function getCommentaireById(){
      $requete = $this->_db->prepare("SELECT * FROM comment WHERE idArticle = :idArticle");
      $requete->bindValue("idArticle", $this->_object->getId());
      $requete->execute();
      $rep = $requete->fetchAll();
      return $rep;
    }
}