<?php
session_destroy();
$titre="Déconnexion";

echo '<div class="ligne">Vous êtes à présent déconnecté </div>';
header("refresh:3;url=Routes.php");
?>
