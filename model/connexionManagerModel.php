<?php

class connexionManagerModel extends dbManager{

    private $_db;
    private $_passwordV;
    private $_usernameV;
    private $_objectUser;

    public function __construct($connexionClass){
      $this->_db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
      // $this->_db = new dbManager();
      var_dump($this->_db);
      $this->setInfo($connexionClass);
      $this->checkerAll($connexionClass);
      // $connexionClass->afficheFormulaire();

    }

    public function setInfo($connexionClass){
      $q = $this->_db->query("SELECT * FROM user WHERE username = '$connexionClass->getUsername()'");
      var_dump($q);
      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
      {
        $this->_passwordV = $donnees['password'];
        $this->_usernameV = $donnees['username'];
      }
      // return $montableau;
    }

    public function checkerAll($connexionClass){
      if($this->_usernameV == $connexionClass->getUsername()){
        //Si username valid
        if(password_verify($connexionClass->getPassword(), $this->_passwordV)){
          //Password valid
          // header('Location: ?action=admin');
        }else{
          //Password invalid
          // header('Location: ?action=login');
        }
      }else{
        //Username invalid
        // header('Location: ?action=login');
      }
    }

}