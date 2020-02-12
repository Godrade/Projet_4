<?php

class sessionClass{

    private $_username;

    public function __construct($sessionUser){
        $this->setUsername($sessionUser);
    }

    //SETTER
    public function setUsername($sessionUser){
        $this->_username = $sessionUser->_username;
    }

    //GETTER
    public function getUsername(){return $this->_username;}
    public function getStartSession(){return $this->startSession();}


    //SET SESSION
    public function startSession(){
        if(!isset($_SESSION)){
            session_start();
            $_SESSION['username'] = $this->_username;
        }
    }
}

class sessionDelete{
    function deleteSession(){
        session_start();
        if(session_destroy()){
            header("Location: index.php?action=login");
        }
    }
}