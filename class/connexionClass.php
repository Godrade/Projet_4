<?php

class connexionClass{
   
    private $_username;
    private $_password;

    private $_objectAccount;

    public function __construct(array $post){

        $this->setUsername($post["username"]);
        $this->setPassword($post["password"]);

    }

    //SETTER
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
          $this->connectionUser();
          echo "PASSWORD OK";
        }else{
          //PASSWORD ERROR.
          $this->connectionError();
          echo "PASSWORD ERROR";
        }
      }else{
        //USERNAME ERROR.
        $this->connectionError();
        echo "USERNAME ERROR";
      }
    }



    //CONNECTION USER
    public function connectionUser(){
      $this->openSessionUser();
      header('Location: ?action=admin');
    }

    //CONNECTION ERROR
    public function connectionError(){
      header('Location: ?action=login');
    }

    //SESSION START
    public function openSessionUser(){
      if(!isset($_SESSION)){
        session_start();
        $_SESSION['username'] = $this->_objectAccount['username'];
      }
    }

    
}