<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mes données</title>
</head>
<body>

	<?php session_start(); ?>

	<ul>
		<li><a href="affichageDonnees.php">MES DONNEES</a></li>
		<li><a href="index.php">Déconnecter</a></li>
	</ul>

	<!-- AFFICHAGE DE L'ENSEMBLE DES DONNEES DE L'UTILISATEUR -->

	<fieldset>
		<legend>MES DONNEES :</legend>
		<p><strong>IDENTIFIANT</strong> : n°<?php echo $_SESSION['idClient'];?></p>
		<p><strong>NOM</strong> : <?php echo $_SESSION['nomClient'];?></p>
		<p><strong>PRENOM</strong> : <?php echo $_SESSION['prenomClient'];?></p>
		<p><strong>ADRESSE MAIL</strong> : <?php echo $_SESSION['adresseMailClient'];?></p>
		<p><strong>MOT DE PASSE</strong> : <?php echo $_SESSION['mdpClient'];?></p>
	</fieldset>

	<!---------------------------------------------------------->

</body>
</html>