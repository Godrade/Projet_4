<?php

class articlesManagerModel{

    private $_db;
    private $_object;

    public function __construct($post = false){
      if($post != false && isset($post)){
        $this->_object = $post;
       }
      $this->_db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
    }

    public function addArticle(){
      $requete = $this->_db->prepare("INSERT INTO article (`name`, `creation_date`, `content`, `image`) VALUES (:name, :creation_date, :content, :image)");
      $requete->bindValue(":name", $this->_object->getTitle(), PDO::PARAM_STR);
      $requete->bindValue(":creation_date", date("Y-m-d H:i:s"), PDO::PARAM_STR);
      $requete->bindValue(":content", $this->_object->getContent(), PDO::PARAM_STR);
      $requete->bindValue(":image", $this->_object->getImage(), PDO::PARAM_STR);
      $rep = $requete->execute();
      return $rep;
    }

    //Update = Retrun tableau
    public function updateArticle(){
      $requete = $this->_db->prepare("UPDATE article SET name = :name, content = :content, image = :image WHERE id = :id");
      $requete->bindValue("name", $this->_object->getTitle());
      $requete->bindValue("content", $this->_object->getContent());
      $requete->bindValue("image", $this->_object->getImage());
      $requete->bindValue("id", $this->_object->getId());
      $rep = $requete->execute();
      return $rep;
    }

    //Deleted = Retrun tableau
    public function deleteArticle(){
      $requete = $this->_db->prepare("DELETE FROM article WHERE id = :id");
      $requete->bindValue("id", $this->_object->getId());
      $rep = $requete->execute();
      return $rep;
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
      $rep = $requete->fetchAll();
      return $rep;
  }

    //SelecteById = Retrun tableau
    public function SelectArticleById(){
      $requete = $this->_db->prepare("SELECT * FROM article WHERE id = :id");
      $requete->bindValue("id", $this->_object->getId());
      $requete->execute();
      $rep = $requete->fetch();
      return $rep;
    }
}