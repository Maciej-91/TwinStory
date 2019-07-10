<?php
// ---------------> testé et approuvé par Julien. //
//Manageur SQL de la table Utilisateur // idUtilisateur, pseudo, motDePasse, role //
class UtilisateurManager
{
    //AJOUTER//
    //Fonction ajoutant une entrée en DB
    static public function add(Utilisateur $user)
    {
        $db = DbConnect::getDb(); 
        // Préparation de la requête d'insertion.
        $q = $db->prepare('INSERT INTO utilisateur(email ,pseudo, motDePasse, confirm) VALUES(:email, :pseudo, :motDePasse, :confirm)');

        // Assignation des valeurs .
        $q->bindValue(':email', $user->getEmail());
        $q->bindValue(':pseudo', $user->getPseudo());
        $q->bindValue(':motDePasse', $user->getMotDePasse());
        $q->bindValue(':confirm', $user->getMotDePasse());


        // Exécution de la requête.
        $q->execute();
        $q->CloseCursor();
    }


    //SELECTIONNER//
    //Fonction retournant un objet correspondant à un pseudo (Pour Check Connexion)
    static public function getByPseudo($pseudo)
    {
        $db = DbConnect::getDb(); 
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
        $q = $db->prepare('SELECT idUtilisateur, email, pseudo, motDePasse FROM Utilisateur WHERE pseudo = :pseudo');
        // Assignation des valeurs .
        $q->bindValue(':pseudo', $pseudo);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $q->CloseCursor();
        if ($donnees == false) 
        { // Si l'Utilisateur n'existe pas, on renvoi un objet vide
            return new Utilisateur();
        } 
        else 
        {
            return new Utilisateur($donnees);
        }
    }


    //SUPPRIMER//
    //Fonction supprimant l'entrée correspondant à l'ID
    public static function delete(Utilisateur $user)
    {
        $db = DbConnect::getDb(); 
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM Utilisateur WHERE idUtilisateur = ' . $user->getIdUtilisateur());
    }


    //GET BY ID//
    //Fonction retournant un objet correspondant à une ID de la BDD
    public static function getById($id)
    {
        $db = DbConnect::getDb(); 
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Personne.
        $id = (int)$id;

        $q = $db->query('SELECT idUtilisateur, pseudo, motDePasse, email FROM Utilisateur WHERE idUtilisateur = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Utilisateur($donnees);
    }


    //GET LIST//
    //Fonction retournant une liste contenant tous les enregistrements de la BDD, sous forme d'objet
    public static function getList()
    {
        $db = DbConnect::getDb(); 
        // Retourne la liste de tous les Utilisateurs.

        $q = $db->query('SELECT idUtilisateur, pseudo, motDePasse, email FROM Utilisateur ORDER BY pseudo');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
             //test si la requête renvoi des données
            do 
            {
                $users[] = new Utilisateur($donnees);
            } 
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $users;
        } 
        else 
        {
            return null;
        }
    }


    //Fonction mettant à jour un enregistrement BDD correspondant à l'ID fournie
    public static function update(Utilisateur $user)
    {
        $db = DbConnect::getDb(); 
        // Pr�pare une requ�te de type UPDATE.
        $q = $db->prepare('UPDATE Utilisateur SET idUtilisateur=:idUtilisateur, pseudo=:pseudo, motDePasse=:motDePasse, email=:email  WHERE pseudo = :pseudo');

        // Assignation des valeurs � la requ�te.
        $q->bindValue(':idUtilisateur', $user->getIdUtilisateur());
        $q->bindValue(':pseudo', $user->getPseudo());
        $q->bindValue(':motDePasse', $user->getMotDePasse());
        $q->bindValue(':email', $user->getEmail());
        // Ex�cution de la requ�te.
        $q->execute();
    }
}
?>