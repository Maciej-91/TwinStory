<?php
if (!isset($_POST['commentaire'])) // On est dans la page de formulaire
{
    require adresseRoot.'/PHP/View/HtmlForum.php';
} 
else{
switch($_GET['action'])
{
    case 'ajout':
    {
        $commentaire = new Commentaire(["date"=>"NOW()", "commentaire"=>$_POST["commentaire"], "idUtilisateur"=>$_SESSION["id"] ]);
        CommentaireManager::add($commentaire);
        break;
    }
    case 'modifCom':
    {
        $commentaireForum = new Forum(["idForum"=>$idforum, "datePost"=>"NOW()", "contenu"=>$_POST["contenu"], "idUtilisateur"=>$_SESSION["id"]]);
        ForumManager::update($commentaireForum);
        break;
    }
    case 'supprCom':
    {
        $commentaireForum = new Forum(["idForum"=>$idforum, "datePost"=>"NOW()", "contenu"=>$_POST["contenu"], "idUtilisateur"=>$_SESSION['id']]);
        ForumManager::delete($commentaireForum);
        break;
    }
}
header("location:Routes.php?action=forum");
}

?>