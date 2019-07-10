<?php
// ---------------> testé et approuvé par Julien. //
//Manageur SQL de la table Article // idArticle, pseudo, motDePasse, role //
class ArticleManager
{
    //AJOUTER//      ---------------> testé et approuvé par Julien.
    //Fonction ajoutant une entrée en DB
    static public function add(Article $art)
    {
        $db = DbConnect::getDb(); 
        // Préparation de la requête d'insertion.
        $q = $db->prepare('INSERT INTO Article(idArticle, titre, contenu) VALUES(:idArticle, :titre, :contenu)');

        // Assignation des valeurs .
        $q->bindValue(':titre', $art->getTitre());
        $q->bindValue(':contenu', $art->getContenu());

        // Exécution de la requête.
        $q->execute();
        $q->CloseCursor();
    }


    //SUPPRIMER//
    //Fonction supprimant l'entrée correspondant à l'ID
    public static function delete(Article $art)
    {
        $db = DbConnect::getDb(); 
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM Article WHERE idArticle = ' . $art->getIdArticle());
    }


    //GET BY ID//
    //Fonction retournant un objet correspondant à une ID de la BDD
    public static function getById($id)
    {
        $db = DbConnect::getDb(); 
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Personne.
        $id = (int)$id;

        $q = $db->query('SELECT idArticle, chapitre, titre, contenu FROM Article WHERE idArticle = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Article($donnees);
    }


    //GET LIST//
    //Fonction retournant une liste contenant tous les enregistrements de la BDD, sous forme d'objet
    public static function getArticle($titre)
    {
        $db = DbConnect::getDb(); 
        // Retourne la liste de tous les Articles.

        $q = $db->query('SELECT titre, chapitre, contenu FROM article WHERE titre = "' .$titre.'"');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
             //test si la requête renvoi des données
            do 
            {
                $arts = new Article($donnees);
            } 
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $arts;
        } 
        else 
        {
            return null;
        }
    }


    public static function getByChapitre($chapitre)
    {
        $db = DbConnect::getDb(); 
        // Retourne la liste de tous les Articles.

        $q = $db->query('SELECT idArticle, titre, chapitre, contenu FROM article WHERE chapitre = "' .$chapitre.'"');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
             //test si la requête renvoi des données
            do 
            {
                $arts[] = new Article($donnees);
            } 
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $arts;
        } 
        else 
        {
            return null;
        }
    }


    public static function AfficherContenu($idArticle)
    {
        $article = self::getById($idArticle);
        $contenu = $article->getContenu();
        $parties = explode("<figure>", $contenu );
        if(count($parties) >1){
            $resultat = "";
            $listImages = ImageManager::getImageByIdArticle($idArticle);
            $index = 0;
            foreach($parties as $elt){
                $resultat .= $parties[$index];
                if($index<count($listImages))
                {
                $img = $listImages[$index];
                $resultat .= '<figure class="'.$img->getPositionIMG().'"><img id="'.$img->getIdImage().'" src="'.$img->getSource().'" alt="'.$img->getAlt().'"><figcaption>'.$img->getLegende().'</figcaption></figure>';
                  }
                  $index+=1;
            }
            return $resultat;
        }
        else return $contenu;
    }

    






    public static function getListArticle()
    {
        $db = DbConnect::getDb(); 
        // Retourne la liste de tous les Articles.

        $q = $db->query('SELECT chapitre, contenu FROM article ORDER BY titre LIMIT ');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
             //test si la requête renvoi des données
            do 
            {
                $arts = new Article($donnees);
            } 
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $arts;
        } 
        else 
        {
            return null;
        }
    }


    //Fonction mettant à jour un enregistrement BDD correspondant à l'ID fournie
    public static function update(Article $art)
    {
        $db = DbConnect::getDb(); 
        // Pr�pare une requ�te de type UPDATE.
        $q = $db->prepare('UPDATE Article SET idArticle=:idArticle, titre=:titre, contenu=:contenu WHERE idArticle = :idArticle');

        // Assignation des valeurs � la requ�te.
        $q->bindValue(':idArticle', $art->getIdArticle());
        $q->bindValue(':titre', $art->getTitre());
        $q->bindValue(':contenu', $art->getContenu());
        // Ex�cution de la requ�te.
        $q->execute();
    }
}
?>