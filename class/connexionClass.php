<?php

class connexionClass{
   
    private $_id;
    private $_username;
    private $_password;

    private $_objectAccount;

    public function __construct($post){
        $this->hydrate($post);

    }

    public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
        // On récupère le nom du setter correspondant à l'attribut.
        $method = 'set'.ucfirst($key);
            
        // Si le setter correspondant existe.
        if (method_exists($this, $method))
        {
          // On appelle le setter.
          $this->$method($value);
        }
      }
    }

    //SETTER
    public function setId($id)
    {
      $this->_id = (int) $id;
    }

    public function setUsername($username){
        $this->_username = $username;    
    }

    public function setPassword($password){
        $this->_password = $password;
    }

    public function setObjectAccount($objectUser){
        $this->_objectAccount = $objectUser;
    }

    //GETTER
    public function getUsername(){return $this->_username;}
    public function getPassword(){return $this->_password;}
    public function getObjectAccount(){return $this->_objectAccount;}

    

    //VERIFY CONNECTION
    public function verifyConnection(){
      if($this->_objectAccount['username'] == $this->getUsername()){
        //Username OK.
        if(password_verify($this->getPassword(), $this->_objectAccount['password'])){
          //Password OK.
          return true;
        }else{
          //PASSWORD ERROR.
          return false;
        }
      }else{
        //USERNAME ERROR.
        return false;
      }
    }

    //CONNECTION USER
    public function connectionUser(){
      $this->openSessionUser();
      return true;
    }

    //CONNECTION ERROR
    public function connectionError(){
      return false;
    }

    //SESSION START
    public function openSessionUser(){ 
      if(!isset($_SESSION['user'])){
        $tabUser = array ( "username" => $this->_username );
        $_SESSION['user'] = $tabUser;
      }
    }

    public function desrtoySessionUser(){
          unset($_SESSION['user']);
        if(!isset($_SESSION['user'])){
          return true;
        }
        return false;
      }

    
}