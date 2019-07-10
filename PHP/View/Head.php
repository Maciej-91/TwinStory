<!DOCTYPE html>
<html lang="en">
<head>
<?php
function chargerClasse($classe)
{
    if (file_exists(adresseRoot . "Php/Controller/" . $classe . ".class.php")) {
        require adresseRoot . "Php/Controller/" . $classe . ".class.php";
    }

    if (file_exists(adresseRoot . "Php/Model/" . $classe . ".class.php")) {
        require adresseRoot . "Php/Model/" . $classe . ".class.php";
    }

}
spl_autoload_register("chargerClasse");

// initialise une connection
DbConnect::init();
session_start();
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo Parametre::getAdresseRoot();?>/CSS/home.css">
    <title>Twins' Story</title>
</head>