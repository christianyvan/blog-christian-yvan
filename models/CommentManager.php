<?php

/**
 * Description of CommentaireManager
 *
 * @author Christian
 */
class CommentManager extends Model{
    // fonction à vérifier
     public function getComments($postId){
        $db = $this->getBdd();
        $sql = 'SELECT * FROM comments WHERE postId = ?';
        $req = $db->query("SELECT * FROM comments WHERE postId = $postId ");
        $data = [];
        while($row = $req->fetch(PDO::FETCH_ASSOC)){
           // var_dump($row);
            
           // $name[]= $row['nom'];
            $data[]= new Post($row);
           // var_dump($data);
            
        }
       // close_cursor();
        return $data;
         
    }
    
    // ajouter un commentaire à la base
    public function toComment($author,$content,$posId,$date)
    {
       $sql = "INSERT INTO comments (author,content,postId,date)"
              ." values(?,?,?,?)";
       $date = date(DATE_W3C);
       
       $this->executeRequest($sql,array($author,$content,$posId,$date));
    }
       
    
}
