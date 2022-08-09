<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Retour création comptes</title>
</head>
<body>
	<?php

		// Inclusion de la classe Client
		require("Client.php");

		// Quand je clique sur le bouton btnCreation :
		if(isset($_POST['btnCreation'])){

			$unClient = new Client($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mdp']);

			if($unClient->verificationAdresseMail()>0){
				echo "Cette adresse mail a déjà été utilisée. Veuillez en choisir une autre";
			}
			else{
				
				$unClient->insertClientBDD();

				echo "Enregistrement effectué !!!<br><br>";

				// Affichage des données saisies par l'utilisateur
				echo "VOS DONNEES : <br><br>";

				echo "<strong>Nom</strong> : ".$unClient->getNomClient()."<br><br>";
				echo "<strong>Prénom</strong> : ".$unClient->getPrenomClient()."<br><br>";
				echo "<strong>Adresse mail</strong> : ".$unClient->getAdresseMailClient()."<br><br>";
				echo "<strong>Mot de passe</strong> : ".$unClient->getMdpClient()."<br><br>";
			}
		}

	?>
		<a href="index.php">Retour</a>
</body>
</html>