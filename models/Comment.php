<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commentaire
 *
 * @author Christian
 */
class Comment {
    private $_id;
    private $_author;
    private $_content;
    private $_postId;
    private $_date;
    
    public function __construct(array $data) {
        $this->hydrate($data);
    }
    
    // hydratation des données à partir des setters
    public function hydrateComment(array $data){
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
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
    
    public function setAuthor($author){
        if (is_string($author)) {
            $this->_author = $author;
        }
    }
    
    public function setContent($content){
        if (is_string($content)) {
            $this->_content = $content;
        }
    }
    
     public function setDate($date){
        $this->_date = $date;
     }
     
    public function id(){
         return $this->_id;
     }
     
     public function author(){
         return $this->_title;
     }
     
     public function content(){
         return $this->_content;
     }
     
     public function date(){
         return $this->_date;
     }
     
     public function postId(){
         return $this->_postId;
     }
     
      
      
            
}