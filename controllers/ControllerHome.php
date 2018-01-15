<?php
require_once ('views/View.php');

/**
 * Description of ControllerAccueil
 *
 * @author Christian
 */
// classe pour gérer l'accueil
class ControllerHome {
    private $_postManager;
    private $_view;
    
    public function __construct($page){
        if (isset($page) && count($page) > 1) {
            throw new Exception('Page introuvable');
        } else {
            $this->posts();
        }
    }
    
    private function posts(){
        $this->_postManager = new PostManager();
        $posts = $this->_postManager->getPosts();
        $this->_view = new View('Home');
        $this->_view->generate(array('posts' => $posts));//
        
    }
}
