<?php

class commentaireClass{
   
    private $_id;
    private $_idArticle;
    private $_content;
    private $_username;
    private $_report;
    private $_createdDate;
    private $_newDate;

    private $_dbReturn;


    public function __construct($data){
       if(isset($data)){
        $this->setNewDate();
        $this->hydrate($data);
       }
    }

    public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
        $method = 'set'.ucfirst($key);
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
    }

    //SETTER
    public function setId($id){
      $this->_id = (int) $id;
    }

    public function setIdArticle($idArticle){
      $this->_idArticle = (int) $idArticle;
    }

    public function setUsername($username){
      if(ctype_space(htmlspecialchars($username))){
        return false;
      }elseif(strlen(htmlspecialchars($username)) > 30){
        return false;
      }else{
        $this->_username = htmlspecialchars($username); 
      }
    }

    public function setContent($content){
      if(ctype_space(htmlspecialchars($content))){
        return false;
      }elseif(strlen(htmlspecialchars($content)) > 500){
        return false;
      }else{
        $this->_content = htmlspecialchars($content);
      }
    }

    public function setReport($report){
        $this->_report = htmlspecialchars($report);    
    }

    public function setCreatedDate($createdDate){
        $this->_createdDate = htmlspecialchars($createdDate);
    }
    
    public function setNewDate(){
        $this->_newDate = date("Y-m-d H:i:s");   
    }

    public function setDbReturn($dbReturn){
      $this->_dbReturn = $dbReturn;    
    }

    //GETTER
    public function getId(){return $this->_id;}
    public function getIdArticle(){return $this->_idArticle;}
    public function getUsername(){return $this->_username;}
    public function getContent(){return $this->_content;}
    public function getReport(){return $this->_report;}
    public function getCreatedDate(){return $this->_createdDate;}
    public function getNewDate(){return $this->_newDate;}

    //FUNCTIONS
    public function reportCommentaire(){
        $this->_report++;
    }

    public function resetReport(){
      $this->_report = 0;
    }

    public function check(){
      if($this->getUsername() == false || $this->getContent() == false){
        return false;
      }else{
        return true;
      }
    }

    public function checkComment(){
      if(!$this->_dbReturn){
        return false;
      }else{
        return true;
      }
    }
}