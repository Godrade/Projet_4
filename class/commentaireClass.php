<?php

class commentaireClass{
   
    private $_id;
    private $_idArticle;
    private $_content;
    private $_username;
    private $_report;
    private $_createdDate;
    private $_newDate;


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
        $this->_username = htmlspecialchars($username);    
    }

    public function setContent($content){
        $this->_content = htmlspecialchars($content);    
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
}