<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Retour connexion</title>
</head>
<body>
	<?php

		// Inclusion de la fichier sur la connexion BDD
		require("fonctionConnexionBDD.php");

		// Utilisation de la variable globale pour y instancier la fonction initBDD()
		$GLOBALS['pdo']=initBDD();

		// Quand je clique sur le bouton btnConnexion :
		if(isset($_POST['btnConnexion'])){

			// Requête SQL affichant toutes les informations d'un client en fonction de son adresse mail et mot de passe
			$selectClient = $GLOBALS['pdo']->query("SELECT * FROM clients WHERE adresseMailClient = '".$_POST['mail']."'");
			$row = $selectClient->fetch(PDO::FETCH_ASSOC);

			// Si l'adresse mail et le mot de passe saisis par l'utilisateur est égal à aux valeurs (adresse mail + MDP) dans la BDD : 
			if($row["adresseMailClient"] == $_POST['mail'] && password_verify($_POST['mdp'], $row["mdpClient"])){

				// Connexion réussi + affectation de tous les informations de la table Client dans chaque variable de SESSION
				echo "CONNEXION REUSSI !!!<br><br>";

				session_start();

				$_SESSION['idClient']=$row['idClient'];
				$_SESSION['nomClient']=$row['nomClient'];
				$_SESSION['prenomClient']=$row['prenomClient'];
				$_SESSION['adresseMailClient']=$row['adresseMailClient'];
				$_SESSION['mdpClient']=$_POST['mdp'];

				echo "Bienvenue sur le site ".$_SESSION['nomClient']." ".$_SESSION['prenomClient']."<br><br>";
	?>

	<!-- AFFICHAGE DU MENU DE NAVIGATION -->

	<ul>
		<li><a href="affichageDonnees.php">MES DONNEES</a></li>
		<li><a href="index.php">Déconnecter</a></li>
	</ul>

	<!----------------------------------------->

	<?php
			}
			else{
				// Echec de la connexion, il faut recommencer à saisir les valeurs jusqu'à ce que se soit bon.
				echo "ECHEC DE LA CONNEXION : adresse mail ou mot de passe incorrect !!!";
			}
		}

	?>
</body>
</html>