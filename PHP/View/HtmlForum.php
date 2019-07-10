<div id="titreForum"><h3>Bienvenue sur notre forum !</h3></div>
<div id="contenerForum">
    <div id="divText">
        <div id="pseudoF"><?php echo $_SESSION['pseudo']?></div>
        <form method="post" action="<?php echo serverRoot;?>?action=ajout" enctype="multipart/form-data">
        <div class="divBtnText">
            <textarea name="commentaire" id="commentaire">Ecrivez votre commentaire</textarea>
            <input id="publier" type="submit" value="Publier" />
        </div>
		</form>
    </div>
</div>