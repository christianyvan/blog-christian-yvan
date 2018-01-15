<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminManager
 *
 * @author Christian
 */
class AdminManager {
    public function getPost($postId){
        $bdd = $this->getBdd();
        $sql = 'SELECT * FROM posts WHERE id = ?';
        $post = executeRequest($sql,array($postId));
        if($post->rowCount()== 1){
            return $post->fetch();
        } else {
                throw new Exception("Aucun article ne correspond à cet identifiant");
               }
    }
    
}
