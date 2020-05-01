<?php

class articleClass{
   
    private $_id;
    private $_idArticle;
    private $_title;
    private $_content;
    private $_createdDate;
    private $_username;
    private $_image;

    private $_dbReturn;

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
      if(ctype_space($title)){
        $_SESSION['error'] = "Vous devez rensigner un titre !";
        return false;
      }elseif(strlen($title) < 0){
        $_SESSION['error'] = "Vous devez rensigner un titre !";
        return false;
      }else{
        $title = strtolower($title);
        $title = ucfirst($title);
        $this->_title = htmlspecialchars($title);
      }
    }

    public function setContent($content){
      if(ctype_space($content)){
        $_SESSION['error'] = "Vous devez rensigner un contenue !";
        return false;
      }elseif(strlen($content) < 0){
        $_SESSION['error'] = "Vous devez rensigner un contenue !";
        return false;
      }else{
        $content = str_replace("<script>", "", $content);
        $content = str_replace("</script>", "", $content);
        $this->_content = $content;
      }
    }

    public function setCreatedDate($createdDate){
      $this->_createdDate = date("Y-m-d H:i:s");    
    }

    public function setImage($image){
      $this->_image = $image;
    }

    public function setDbReturn($dbReturn){
      $this->_dbReturn = $dbReturn;    
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
    public function check(){
      if($this->getTitle() == false || $this->getContent() == false || $_FILES['image']['error'] == 4){
        $_SESSION['error'] = "Vous devez renseigner tout les champs !";
        return false;
      }else{
        return true;
      }
    }

    public function checkerById(){
      if(!$this->_dbReturn){
        return false;
      }else{
        return true;
      }
    }

    public function uploadFiles(){
      $target_dir = "public/upload/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $uploadOK = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      //Vérif image double
      if(file_exists($target_file)){
        echo('Erreur : Cette image existe dèjà ! <br>');
        $_SESSION['error'] = "Erreur : Cette image existe déjà !";
      }
      //Vérif size
      if($_FILES['image']['size'] > 1000000){
        $_SESSION['error'] = "Fichier trop volumineux ! 1Mo MAX";
        $uploadOK = 0;
      }
      //Vérif type
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
        $_SESSION['error'] = "Type de fichier non autorisée ! (jpg/png/jpeg)";
        $uploadOK = 0;
      }
      //Vérif upload
      if($uploadOK == 0){
        echo('Error');
      }else{
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
          $this->setImage($target_file);
          $_SESSION['success'] = "Le fichier ". basename( $_FILES["image"]["name"]). " a bien été upload.";
        }else{
          $_SESSION['error'] = "Une erreur d'upload c'est produite, Merci de re-essayer ";
        }
      }
    }

}