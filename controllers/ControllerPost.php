<?php
require_once ('views/View.php');
//require_once ('models/PostManager.php');
//require_once ('models/CommentManager.php');

/**
 * Description of ControleurArticle
 *
 * @author Christian
 */
// classe pour gérer l'affichage d'un billet

class ControllerPost {
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
    
    private function post($postId){
        $this->_postManager = new PostManager();
        $this->_commentManager = new CommentManager();
        $post = $this->_postManager->getPost($postId);
        $comments = $this->_commentManager->getComments($postId);
        $this->_view = new View('Post');
        $this->_view->generate(array('post' => $post,'comments'=> $comments));//
        
    }
}