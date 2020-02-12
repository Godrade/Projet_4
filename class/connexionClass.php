<?php

class connexionClass{
   
    private $_username;
    private $_password;

    public function __construct(array $post){

        $this->setUsername($post["username"]);
        $this->setPassword($post["password"]);
        
    }

    //GETTER
    public function getUsername(){return $this->_username;}
    public function getPassword(){return $this->_password;}

    //SETTER
    public function setUsername($username){ 
        //Verif   
        $this->_username = $username;    
    }
    public function setPassword($password){
         //Verif 
        $this->_password = $password;
    }

    public function afficheFormulaire(){
        echo "<br> Username : " . $this->getUsername();
        echo "<br> Password : " . $this->getPassword();
    }

}



