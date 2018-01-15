<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Christian
 */
class Admin {
    private $_id;
    private $_name;
    private $_email;
    private $_password;
    private $_token;
    private $_role;
    


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
    
    public function setName($name){
        
        if ($id > 0) {
            if (is_string($name)) {
            $this->_name = $name;
        }
        }
    }
    
    public function setEmail($email){
        if (is_string($email)) {
            $this->_email = $email;
        }
    }
    
    public function setPassword($password){
        if (is_string($password)) {
            $this->_password = $password;
        }
    }
    
    public function setToken($token){
        if (is_string($token)) {
            $this->_token = $token;
        }
    }
    
    public function setRole($role){
        if (is_string($role)) {
            $this->_role = $role;
        }
    }
    
    public function id(){
         return $this->_id;
     }
     
     public function name(){
         return $this->_name;
     }
     
     public function email(){
         return $this->_email;
     }
     
    public function password(){
         return $this->_password;
     }
     
     public function token(){
         return $this->_token;
     }
     
      public function role(){
         return $this->_role;
     }
     
}
