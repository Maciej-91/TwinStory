<!-- Affichage du formulaire qui permet la saisie -->
<div id="contenerInscription">
	<div id="contenuInscription">
		<h1 class="titreForm">Céer un compte</h1>
		<form method="post" action="<?php echo serverRoot; ?>?action=creerCompte" enctype="multipart/form-data">
			<label for="email">Adresse email<span class="star"> *</span></label>
			<input name="email" type="text" id="email" placeholder="nom.email@domain.com"/>
			<label for="pseudo">Nom d'utilisateur<span class="star"> *</span></label>
			<input type="text" name="pseudo" id="pseudo" placeholder="votre pseudo public"/>
			<div id="passConfirm">
				<div class="ligneMdp">
					<label for="motDePasse">Mot de Passe<span class="star"> *</span></label>
					<input type="motDePasse" name="motDePasse" id="motDePasse" />
				</div>
				<div class="ligneConf">
					<label for="confirm">Confirmer le mot de passe<span class="star"> *</span></label>
					<input type="confirm" name="confirm" id="confirm" />
				</div>
			</div>
			<input id="submit" type="submit" value="Je m'inscris" />
		</form>
	</div>
</div>