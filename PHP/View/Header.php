
<body>
<?php
if(!empty($_SESSION['id']))
{
    echo '<div id="entete">
     <div class="titreLogo">
     <h1><a href="'.Parametre::getAdresseRoot().'">TWINS\' Story</h1>
     <div class="espaceHorizontal"></div>
     <img class="logo" src="'.Parametre::getAdresseRoot().'/Images/plume.png" alt="plumeLogo">
     <div id="btnRetour"><a class="btnDeco" href="'.Parametre::getServerRoot().'?action=deconnexion">Déconnexion</a></div>
     </div>';
}
else {
    echo '<div id="entete">
        <div class="titreLogo">
            <h1><a href="'.Parametre::getAdresseRoot().'">TWINS\' Story</h1>
            <div class="espaceHorizontal"></div>
            <img class="logo" src="'.Parametre::getAdresseRoot().'/Images/plume.png" alt="plumeLogo">
        </div>';
    include('nav.php');
        
    echo '  </div>';
}
