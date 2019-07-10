<!-- Affichage du formulaire qui permet la saisie -->
<div id="contenerInscription">
	<div id="contenuInscription">
		<h1 class="titreForm">Connexion</h1>
		<form method="post" action="<?php echo serverRoot; ?>?action=connexion">
			<input name="pseudo" type="text" id="pseudo" placeholder="Votre pseudo"/>
			<input type="password" name="password" id="password" placeholder="Votre mot de passe"/>
			<input type="submit" id="submit" value="Connexion" />
		</form>
	</div>
</div>