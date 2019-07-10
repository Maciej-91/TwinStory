<?php
// ---------------> testé et approuvé par Julien. //
//Manageur SQL de la table Image // idImage, pseudo, motDePasse, role //
class ImageManager
{
    //AJOUTER//
    //Fonction ajoutant une entrée en DB
    static public function add(Image $picture)
    {
        $db = DbConnect::getDb(); 
        // Préparation de la requête d'insertion.
        $q = $db->prepare('INSERT INTO Image(idImage, source, alt, legende, idArticle) VALUES(:idImage, :source, :alt, :legende, :idArticle)');

        // Assignation des valeurs .
        $q->bindValue(':idImage', $picture->getIdImage());
        $q->bindValue(':source', $picture->getSource());
        $q->bindValue(':alt', $picture->getAlt());
        $q->bindValue(':legende', $picture->getLegende());
        $q->bindValue(':idArticle', $picture->getidArticle());

        // Exécution de la requête.
        $q->execute();
        $q->CloseCursor();
    }


    //SUPPRIMER//
    //Fonction supprimant l'entrée correspondant à l'ID
    public static function delete(Image $picture)
    {
        $db = DbConnect::getDb(); 
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM Image WHERE idImage = ' . $picture->getIdImage());
    }


    //GET BY ID//
    //Fonction retournant un objet correspondant à une ID de la BDD
    public static function getById($id)
    {
        $db = DbConnect::getDb(); 
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Personne.
        $id = (int)$id;

        $q = $db->query('SELECT idImage, source, alt, legende, idArticle FROM Image WHERE idImage = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Image($donnees);
    }


    public static function getImageByIdArticle($id)
    {
        $db = DbConnect::getDb(); 
        // Retourne la liste de tous les Images.

        $q = $db->query('SELECT idImage, source, alt, legende, idArticle, positionIMG FROM Image WHERE idArticle = '.$id);

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
             //test si la requête renvoi des données
            do 
            {
                $pictures[] = new Image($donnees);
            } 
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $pictures;
        } 
        else 
        {
            return null;
        }
    }


    //GET LIST//
    //Fonction retournant une liste contenant tous les enregistrements de la BDD, sous forme d'objet
    public static function getList()
    {
        $db = DbConnect::getDb(); 
        // Retourne la liste de tous les Images.

        $q = $db->query('SELECT idImage, source, alt, legende, idArticle FROM Image ORDER BY idImage');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
             //test si la requête renvoi des données
            do 
            {
                $pictures[] = new Image($donnees);
            } 
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $pictures;
        } 
        else 
        {
            return null;
        }
    }


    //Fonction mettant à jour un enregistrement BDD correspondant à l'ID fournie
    public static function update(Image $picture)
    {
        $db = DbConnect::getDb(); 
        // Pr�pare une requ�te de type UPDATE.
        $q = $db->prepare('UPDATE Image SET idImage=:idImage, source=:source, alt=:alt, legende=:legende, idArticle=:idArticle WHERE idImage = :idImage');

        // Assignation des valeurs � la requ�te.
        $q->bindValue(':idImage', $picture->getIdImage());
        $q->bindValue(':source', $picture->getSource());
        $q->bindValue(':alt', $picture->getAlt());
        $q->bindValue(':legende', $picture->getLegende());
        $q->bindValue(':idArticle', $picture->getIdArticle());
        // Ex�cution de la requ�te.
        $q->execute();
    }
}
?>