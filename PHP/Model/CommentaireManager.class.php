<?php
// ---------------> testé et approuvé par Julien. //
//Manageur SQL de la table Commentaire // idCommentaire, pseudo, motDePasse, role //
class CommentaireManager
{
    //AJOUTER//
    //Fonction ajoutant une entrée en DB
    static public function add(Commentaire $comment)
    {
        $db = DbConnect::getDb(); 
        // Préparation de la requête d'insertion.
        $q = $db->prepare('INSERT INTO commentaire(date, commentaire, idUtilisateur) VALUES(:date, :commentaire, :idUtilisateur)');

        // Assignation des valeurs .
        $q->bindValue('NOW()', $comment->getDate());
        $q->bindValue(':commentaire', $comment->getCommentaire());
        $q->bindValue(':idUtilisateur', $comment->getIdUtilisateur());

        // Exécution de la requête.
        $q->execute();
        $q->CloseCursor();
    }


    //SUPPRIMER//
    //Fonction supprimant l'entrée correspondant à l'ID
    public static function delete(Commentaire $comment)
    {
        $db = DbConnect::getDb(); 
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM Commentaire WHERE idCommentaire = ' . $comment->getIdCommentaire());
    }


    //GET BY ID//
    //Fonction retournant un objet correspondant à une ID de la BDD
    public static function getById($id)
    {
        $db = DbConnect::getDb(); 
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Personne.
        $id = (int)$id;

        $q = $db->query('SELECT idCommentaire, date, commentaire, idUtilisateur FROM Commentaire WHERE idCommentaire = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Commentaire($donnees);
    }


    //GET LIST//
    //Fonction retournant une liste contenant tous les enregistrements de la BDD, sous forme d'objet
    public static function getList()
    {
        $db = DbConnect::getDb(); 
        // Retourne la liste de tous les Commentaires.

        $q = $db->query('SELECT idCommentaire, date, commentaire, idUtilisateur FROM Commentaire ORDER BY idCommentaire');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
             //test si la requête renvoi des données
            do 
            {
                $comments[] = new Commentaire($donnees);
            } 
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $comments;
        } 
        else 
        {
            return null;
        }
    }


    //Fonction mettant à jour un enregistrement BDD correspondant à l'ID fournie
    public static function update(Commentaire $comment)
    {
        $db = DbConnect::getDb(); 
        // Pr�pare une requ�te de type UPDATE.
        $q = $db->prepare('UPDATE Commentaire SET idCommentaire=:idCommentaire, date=:NOW(), commentaire=:commentaire, idUtilisateur=:idUtilisateur WHERE idCommentaire = :idCommentaire');

        // Assignation des valeurs � la requ�te.
        $q->bindValue(':idCommentaire', $comment->getIdCommentaire());
        $q->bindValue(':NOW()', $comment->getDate());
        $q->bindValue(':commentaire', $comment->getCommentaire());
        $q->bindValue(':idUtilisateur', $comment->getIdUtilisateur());
        // Ex�cution de la requ�te.
        $q->execute();
    }
}
?>