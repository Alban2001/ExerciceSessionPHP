<?php

function initBDD(){

// PhpMyAdmin
// Base de données : MySQL
	
// Valeurs pour la connexion à la BDD
$serveur = 'localhost';
$login = 'root';
$mot_de_passe = 'root';
$base_de_donnees = 'bdd-clients';
$charset = 'utf8';
$port = 3306;

		try{

			// Instanciation d'un objet de type PDO pour affecter les valeurs pour la connexion à la BDD
			$pdo = new PDO('mysql:host='.$serveur.';dbname='.$base_de_donnees.';charset='.$charset.';port='.$port, $login, $mot_de_passe);
		}

		// Affichage d'un message d'erreur
		catch(PDOException $error){

			echo $error->getCode().' '.$error->getMessage();

		}

		return $pdo;
}

?>