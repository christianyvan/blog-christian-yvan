<?php

/**
 * Description of Model
 *
 * @author Christian
 */
abstract class Model {
    private static $_bdd;
    
    // instancie la connexion à la bdd
    private static function setBdd(){
        self::$_bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    
    // récupère la connexion à la bdd
    protected function getBdd(){
        if (self::$_bdd == null) {
            $this->setBdd();
        }
        return self::$_bdd;
    }
    
    // fonction générique permettant d'exécuter un requête, éventuellement paramétrés
    protected function executeRequest($sql,$params = null){
        if($params == null){
            $result = $this->getBdd()->query($sql); // pas de paramêtre , l'exécution n'est pas préparé
        }
        else{
            $result = $this->getBdd()->prepare($sql); // requête préparé
            $result->execute($params);
        }
        return $result;
    }
    
    /**
     * Fonction qui prend en paramêtre la table sur laquelle la requête va s'exécuter,
     *  et le nom de l'objet qui lui récupère le résultat de la requête.
     * @param type $table  contient la table sur laquelle la requête va s'exécuter
     * @param type $obj    contient un objet du type de la table (Article, Commentaire,..)
     * @return \obj $var est un tableau d'objet de type $obj
     */
    protected function getAll($table,$obj){
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }
        $req->closeCursor();
        return $var;
       // 
        
     }
 /*    
     protected function getArticle($idArticle){
         
         $article = self::$_bdd->prepare('SELECT posts.id,posts.title,posts.content,posts.date FROM posts WHERE posts.id = ?');
         $article->execute(array($idArticle));
         if ($article->rowCount() == 1) {
            return $article->fetch();
        } else {
            throw new Exception("Aucun article ne correspond à l\'id :'$idArticle'");
        }
    }
   */  
}
