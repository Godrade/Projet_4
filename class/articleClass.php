<?php

class articleClass{
   
    private $_id;
    private $_idArticle;
    private $_title;
    private $_content;
    private $_createdDate;
    private $_username;
    private $_image;


    public function __construct($data){
       if(isset($data)){
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

    public function setTitle($title){
        $this->_title = htmlspecialchars($title);    
    }

    public function setContent($content){
      $this->_content = $content;
    }

    public function setCreatedDate($createdDate){
      $this->_createdDate = htmlspecialchars($createdDate);    
    }

    public function setImage($image){
      $this->_image = $image;    
    }

    //GETTER
    public function getId(){return $this->_id;}
    public function getIdArticle(){return $this->_idArticle;}
    public function getUsername(){return $this->_username;}
    public function getTitle(){return $this->_title;}
    public function getContent(){return $this->_content;}
    public function getCreatedDate(){return $this->_createdDate;}
    public function getImage(){return $this->_image;}

    //FUNCTIONS
}