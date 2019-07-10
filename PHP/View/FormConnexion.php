<?php
$titre = "Connexion";

if (!isset($_POST['pseudo'])) // On est dans la page de formulaire
{
    require adresseRoot.'/Php/View/HtmlConnexion.php'; // On affiche le formulaire
} else { // Le formulaire a été validé
    $message = '';
    if (empty($_POST['pseudo']) || empty($_POST['password'])) // Oublie d'un champ
    {
        $message = '<p>Une erreur s\'est produite pendant votre identification.
                       Vous devez remplir tous les champs</p>';
        echo '<div class="ligne">'.$message.'</div>';
        header("refresh:3;url=Routes.php?action=connexion");
	                   
    } else // On check le mot de passe
    {
        $utilisateur = UtilisateurManager::getByPseudo($_POST['pseudo']); // On recherche dans la base l'utilisateur et on rempli l'objet user
        if ($utilisateur->getMotDePasse() == md5($_POST['password'])) // Acces OK !
        {
            $_SESSION['pseudo'] = $utilisateur->getPseudo();
            $_SESSION['id'] = $utilisateur->getIdUtilisateur();
            $message = '<p>Bienvenue ' . $utilisateur->getPseudo() . ', vous êtes maintenant connecté!</p>';
		    echo '<div class="ligne">'.$message.'</div>';
            header("refresh:3;url=Routes.php?action=forum");
        }
		else // Acces pas OK !
        {
            $message = '<p>Une erreur s\'est produite pendant votre identification.<br /> Le mot de passe ou le pseudo
            entré n\'est pas correcte.</p>';
            echo '<div class="ligne">'.$message.'</div>';
            header("refresh:3;url=Routes.php?action=connexion");
        }
    }

}

?>