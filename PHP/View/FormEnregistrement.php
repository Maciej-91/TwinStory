<?php
$titre="Enregistrement";

if (empty($_POST['pseudo'])) // Si la variable est vide, on est sur la page de formulaire
{
	require adresseRoot.'/Php/View/HtmlCreerCompte.php'; // On affiche le formulaire
    
    
} //Fin de la partie formulaire

else //On est dans le cas traitement
{
    $pseudo_erreur1 = null;
    $pseudo_erreur2 = null;
    $mdp_erreur = null;
    //On récupère les variables
    $i = 0; // compte le nombre d'erreurs à afficher
    $temps = time();
    $pseudo=$_POST['pseudo'];
    $pass = md5($_POST['motDePasse']); // on hache le password avec md5
    $confirm = md5($_POST['confirm']);
    //Vérification du pseudo
    $utilisateur  = UtilisateurManager::getByPseudo($pseudo);
    if ($utilisateur->getIdUtilisateur()!=null)
    {
        $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
        $i++;
    }
    
    if (strlen($pseudo) < 3 || strlen($pseudo) > 15)
    {
        $pseudo_erreur2 = "Votre pseudo est soit trop grand, soit trop petit";
        $i++;
    }
    
    //Vérification du mdp
    if ($pass != $confirm || empty($confirm) || empty($pass))
    {
        $mdp_erreur = "Votre mot de passe et votre confirmation sont différents, ou sont vides";
        $i++;
    }
    
 
    if ($i==0) // S'il n'y a pas d'erreur
    {
    	$nouvelUtilisateur = new Utilisateur(['email'=>$_POST['email'],'pseudo'=>$_POST['pseudo'],'motDePasse'=>md5($_POST['motDePasse']),'confirm'=>md5($_POST['confirm'])]);
        UtilisateurManager::add($nouvelUtilisateur); // On crée l'utilisateur dans la base
        $nouvelUtilisateur = UtilisateurManager::getByPseudo($_POST['pseudo']); //pour récupérer l'ID
        echo'<div id="inscipRefresh">';
        echo'<div class="ligne">';
        echo'<h1 class="titreRefresh">Inscription terminée</h1>';
        echo'<p>Bienvenue '.stripslashes(htmlspecialchars($_POST['pseudo'])).' vous êtes maintenant inscrit</p>';
        echo'</div>';
        echo'</div>';
        //Et on définit les variables de sessions
        $_SESSION['pseudo'] = $nouvelUtilisateur->getPseudo();
        $_SESSION['id'] = $nouvelUtilisateur->getIdUtilisateur() ;
        header("refresh:3;url=Routes.php?action=connexion");
    }
    else // on affiche les erreurs
    {
        echo'<div id="inscipRefresh">';
        echo'<div class="ligne">';
        echo'<h1 class="titreRefresh">Inscription interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        echo '</div>'; 
        echo'</div>';
        header("refresh:3;url=Routes.php?action=creerCompte");
    }
}



