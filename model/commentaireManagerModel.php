<?php

class commentaireManagerModel extends dbManager{

    private $_object;

    public function __construct($post = false){
      $this->setDb();
      if($post != false && isset($post)){
        $this->_object = $post;
       }
    }

    public function addCommentaire(){
      $requete = $this->_db->prepare("INSERT INTO comment (`idArticle`, `createdDate`, `content`, `name`) VALUES (:idArticle, :createdDate, :content, :name)");
      $requete->bindValue("idArticle", $this->_object->getIdArticle());
      $requete->bindValue("name", $this->_object->getUserName());
      $requete->bindValue("createdDate", $this->_object->getNewDate());
      $requete->bindValue("content", $this->_object->getContent());
      $rep = $requete->execute();
      return $rep;
    }

    public function getCommentaireById(){
      $requete = $this->_db->prepare("SELECT * FROM comment WHERE idArticle = :idArticle  ORDER BY id ASC");
      $requete->bindValue("idArticle", $this->_object->getId());
      $requete->execute();
      $rep = $requete->fetchAll();
      return $rep;
    }

    public function getReportCommentaire(){
      $requete = $this->_db->prepare("SELECT * FROM comment WHERE report >= 1 ORDER BY report DESC");
      $requete->execute();
      $rep = $requete->fetchAll();
      return $rep;
    }

    public function selectCommentaireById(){
      $requete = $this->_db->prepare("SELECT * FROM comment WHERE id = :id");
      $requete->bindValue("id", $this->_object->getId());
      $requete->execute();
      $rep = $requete->fetch(PDO::FETCH_ASSOC);
      return $rep;
    }

    public function addReportCommentaire(){
      $requete = $this->_db->prepare("UPDATE comment SET report = :report WHERE id = :id");
      $requete->bindValue("report", $this->_object->getReport());
      $requete->bindValue("id", $this->_object->getId());
      $rep = $requete->execute();
      return $rep;
    }

    public function resetReport(){
      $requete = $this->_db->prepare("UPDATE comment SET report = :report WHERE id = :id");
      $requete->bindValue("report", $this->_object->getReport());
      $requete->bindValue("id", $this->_object->getId());
      $rep = $requete->execute();
      return $rep;
    }

    public function deleteCommentaire(){
        $requete = $this->_db->prepare("DELETE FROM comment WHERE id = :id");
        $requete->bindValue("id", $this->_object->getId());
        $rep = $requete->execute();
      return $rep;
    }

    public function deleteCommentaireByArticle(){
      $requete = $this->_db->prepare("DELETE FROM comment WHERE idArticle = :idArticle");
      $requete->bindValue("idArticle", $this->_object->getId());
      $rep = $requete->execute();
      return $rep;
  }
}