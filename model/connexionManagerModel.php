<?php

class connexionManagerModel extends dbManager{

    private $_objectUser;
    private $_objectAccount;

    public function __construct($connexionClass){
      $this->setDb();
      $this->_objectUser = $connexionClass;
     
    }

    public function selectUser(){
      $requete = $this->_db->prepare("SELECT username, password FROM user WHERE username = :user");
      $requete->bindValue("user", $this->_objectUser->getUsername());
      $requete->execute();
      $account = $requete->fetch(PDO::FETCH_ASSOC);
      return $account;
    }

}