<?php

/**
 * Description of Article
 *
 * @author Christian
 */
class Post {
    private $_id;
    private $_title;
    private $_content;
    private $_writer;
    private $_image;
    private $_date;
    private $_posted;


    public function __construct(array $data) {
        $this->hydrate($data);
    }
    
    // hydratation des données à partir des setters, $data associe la valeur d'un champ de la table posts à sa valeur
    public function hydrate(array $data){ // exemple: key=id value=1 setId(1)
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);// $key correspond au nom de chaque colonne de la table posts
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
    
    public function setId($id){
        $id = (int)$id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }
    
    public function setTitle($title){
        if (is_string($title)) {
            $this->_title = $title;
        }
    }
    
    public function setContent($content){
        if (is_string($content)) {
            $this->_content = $content;
        }
    }
    
    public function setWriter($writer){
        if (is_string($writer)) {
            $this->_writer = $writer;
        }
    }
    
    public function setImage($image){
        if (is_string($image)) {
            $this->_image = $image;
        }
    }
    
     public function setDate($date){
        $this->_date = $date;
     }
     
      public function setPosted($posted){
        $this->_posted = $posted;
     }
     
    public function id(){
         return $this->_id;
     }
     
     public function title(){
         return $this->_title;
     }
     
     public function content(){
         return $this->_content;
     }
     
    public function writer(){
         return $this->_writer;
     }
     
     public function image(){
         return $this->_image;
     }
     
      public function date(){
         return $this->_date;
     }
     
      public function posted(){
         return $this->_posted;
     }
      
      
            
}
