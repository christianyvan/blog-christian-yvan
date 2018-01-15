<?php

/**
 * Description of ArticleManager
 *
 * @author Christian
 */
class PostManager extends Model{
    public function getPosts(){
        $db = $this->getBdd();
        
        $req = $db->query('SELECT posts.id,
                              posts.title,
                              posts.content,
                              posts.writer,
                              posts.image,
                              posts.date,
                              posts.posted,
                              admins.name
                           FROM posts
                           JOIN admins
                           ON posts.writer=admins.email
                           WHERE posted="1"
                           ORDER BY posts.date DESC ');
      //  $name = [];
        $data = [];
        while($row = $req->fetch(PDO::FETCH_ASSOC)){
           // var_dump($row);
            if( $row['image']==""){$row['image']='alaska.jpg';}
           // $name[]= $row['nom'];
            $data[]= new Post($row);
           // var_dump($data);
            
        }
       // close_cursor();
        return $data;
    }
    
   /**
    * fonction qui prend en paramêtre l'identifiant d'un article et qui renvoie
    * les informations sur l'articles identifié ainsi que les commentaires 
    * associés.
    * @param type $idArticle identifiant de l'article
    */
    public function getPost($postId){
        $data = [];
        $db = $this->getBdd();
        $req = $db->query("SELECT * FROM posts WHERE id = $postId ");
        var_dump($req);
        if($req->rowCount()== 1){
            $row = $req->fetch(PDO::FETCH_ASSOC);
            $data[] = new Post($row);
            return $data;
        } else {
                throw new Exception("Aucun article ne correspond à cet identifiant");
               }
    }
    
    
            
}
