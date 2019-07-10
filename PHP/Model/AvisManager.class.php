<?php
// ---------------> testé et approuvé par Julien. //
//Manageur SQL de la table Avis // idAvis, pseudo, motDePasse, role //
class AvisManager
{
    //AJOUTER//
    //Fonction ajoutant une entrée en DB
    static public function add(Avis $opinion)
    {
        $db = DbConnect::getDb(); 
        // Préparation de la requête d'insertion.
        $q = $db->prepare('INSERT INTO Avis(idAvis, saisie, date, idUtilisateur) VALUES(:idAvis, :saisie,:date, :idUtilisateur)');

        // Assignation des valeurs .
        $q->bindValue(':saisie', $opinion->getSaisie());
        $q->bindValue(':idUtilisateur', $opinion->getIdUtilisateur());

        // Exécution de la requête.
        $q->execute();
        $q->CloseCursor();
    }


    //SUPPRIMER//
    //Fonction supprimant l'entrée correspondant à l'ID
    public static function delete(Avis $opinion)
    {
        $db = DbConnect::getDb(); 
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM Avis WHERE idAvis = ' . $opinion->getIdAvis());
    }


    //GET BY ID//
    //Fonction retournant un objet correspondant à une ID de la BDD
    public static function getById($id)
    {
        $db = DbConnect::getDb(); 
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Personne.
        $id = (int)$id;

        $q = $db->query('SELECT idAvis, saisie, date, idUtilisateur FROM Avis WHERE idAvis = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Avis($donnees);
    }


    //GET LIST//
    //Fonction retournant une liste contenant tous les enregistrements de la BDD, sous forme d'objet
    public static function getList()
    {
        $db = DbConnect::getDb(); 
        // Retourne la liste de tous les Aviss.

        $q = $db->query('SELECT idAvis, saisie, date, idUtilisateur FROM Avis ORDER BY idAvis');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
             //test si la requête renvoi des données
            do 
            {
                $opinions[] = new Avis($donnees);
            } 
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $opinions;
        } 
        else 
        {
            return null;
        }
    }


    //Fonction mettant à jour un enregistrement BDD correspondant à l'ID fournie
    public static function update(Avis $opinion)
    {
        $db = DbConnect::getDb(); 
        // Pr�pare une requ�te de type UPDATE.
        $q = $db->prepare('UPDATE Avis SET idAvis=:idAvis, saisie=:saisie, date, idUtilisateur=:idUtilisateur WHERE idAvis = :idAvis');

        // Assignation des valeurs � la requ�te.
        $q->bindValue(':idAvis', $opinion->getIdAvis());
        $q->bindValue(':saisie', $opinion->getSaisie());
        $q->bindValue(':date', $opinion->getDate());
        $q->bindValue(':idUtilisateur', $opinion->getIdUtilisateur());
        // Ex�cution de la requ�te.
        $q->execute();
    }
}
?>