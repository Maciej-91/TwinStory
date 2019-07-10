<?php
require "PHP/Controller/Parametre.class.php";
//on récupere les paramètres de l'application

Parametre::init();
// Route va gérer tous les affichages de page en fonction de la provenance
include ($_SERVER["DOCUMENT_ROOT"] . Parametre::getServerRoot());
?>
