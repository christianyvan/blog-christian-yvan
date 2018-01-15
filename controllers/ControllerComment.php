<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerComment
 *
 * @author Christian
 */
class ControllerComment {
    private $_postManager;
    private $_commentManager;
    private $_view;
    
     public function __construct($page){
        if (isset($page) && count($page) > 1) {
            throw new Exception('Page introuvable');
        } else {
           
            $this->post($_GET['id']);
        }
    }
    
    private function comments($postId){
        $this->_postManager = new PostManager();
        $this->_commentManager = new CommentManager();
        $post = $this->_postManager->getPost($postId);
        $comments = $this->_commentManager->getComments($postId);
        $this->_view = new View('Comment');
        $this->_view->generate(array('post' => $post,'comments'=> $comments));//
        
    }
}
