<?php
// Le fichier Route permet de gérer toutes les ouvertures de pages

//on definit les constantes qui permet de definir les chemins
if (!class_exists("Parametre")) require "Parametre.class.php";
Parametre::init();
Define("serverRoot", Parametre::getServerRoot());
Define("adresseRoot", $_SERVER['DOCUMENT_ROOT'].Parametre::getAdresseRoot());
// La fonction afficherPage, prend 3 paramètres
// Le chemin où trouver les pages, le nom de la partie contenu à afficher et le titre à donner à la page
function afficherPage($chemin, $page, $titre)
{
    require $chemin . 'Head.php';
    require $chemin . 'Header.php';
        require $chemin . $page;
        require $chemin . 'Footer.php';
}

// A l'include de la page Route, le code suivant est exécuté
// Si la variable $get existe, on exploite les informations pour afficher la bonne page
if (isset($_GET['action'])) {
    // En fonction de ce que contient la variable action de $_GET, on ouvre la page correspondante

    switch ($_GET['action']) {
        case 'creerCompte':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'FormEnregistrement.php', "Nouvel Utilisateur");
                break;
            }
        case 'chap1':
        case 'chap2':
        case 'chap3':
        case 'chap4':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'ArticleContenu.php', "Nouvel Utilisateur");
                break;
            }
        case 'connexion':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'FormConnexion.php', "Nouvel Utilisateur");
            break;
        }
        case 'connect':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'HtmlConnexion.php', "Nouvel Utilisateur");
            break;
        }
        case 'deconnexion':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'FormDeconnexion.php', "Nouvel Utilisateur");
            break;
        }
        case 'creerCompte':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'FormEnregistrement.php', "Nouvel Utilisateur");
            break;
        }
        case 'forum':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'HtmlForum.php', "Nouvel Utilisateur");
            break;
        }
        case 'pageP':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'PagePrincipale.php', "Nouvel Utilisateur");
            break;
        }
        case 'ajout':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'FormForum.php', "Nouvel Utilisateur");
            break;
        }
    }
} 
else
{ // Sinon, on affiche la page principale du site
    afficherPage(adresseRoot . 'PHP/View/', 'PagePrincipale.php', "Accueil");
}
?>
