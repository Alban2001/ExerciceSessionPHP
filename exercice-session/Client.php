<?php

// Inclusion de la fichier sur la connexion BDD
require("fonctionConnexionBDD.php");

// Utilisation de la variable globale pour y instancier la fonction initBDD()
$GLOBALS['pdo']=initBDD();

// Classe Client
final class Client{

	// Propriétés de la classe Client
	private $nomClient;
	private $prenomClient;
	private $adresseMailClient;
	private $mdpClient;

	// Constructeur affectant toutes les valeurs
	public function __construct($unNomClient, $unPrenomClient, $uneAdresseMailClient, $unMdp){
		$this->nomClient = $unNomClient;
		$this->prenomClient = $unPrenomClient;
		$this->adresseMailClient = $uneAdresseMailClient;
		$this->mdpClient = $unMdp;
	}

	// Fonction renvoyant le nom du client
	public function getNomClient(){
		return $this->nomClient;
	}

	// Fonction renvoyant le prénom du client
	public function getPrenomClient(){
		return $this->prenomClient;
	}

	// Fonction renvoyant l'adresse mail du client
	public function getAdresseMailClient(){
		return $this->adresseMailClient;
	}

	// Fonction renvoyant le le mot de passe du client
	public function getMdpClient(){
		return $this->mdpClient;
	}

	// Fonction qui permet de vérifier si l'adresse mail saisit par l'utilisateur existe déjà dans la base de données
	public function verificationAdresseMail(){

		//Requête SQL permettant d'afficher le nombre de ligne qui comporte l'adresse mail saisit par l'utilisateur
		
		$selectClient = $GLOBALS['pdo']->prepare("SELECT COUNT(*) AS 'nb' FROM clients WHERE adresseMailClient=:email");
			$selectClient->execute(array(':email'=>$this->adresseMailClient));
			$row = $selectClient->fetch(PDO::FETCH_ASSOC);

			return $row['nb'];
	}

	// Fonction insérant les données vers la BDD
	public function insertClientBDD(){

		// Requête SQL insérant les données saisies par l'utilisateurs (nom, prénom, adresse mail, mot de passe)

		$insertClient = $GLOBALS['pdo']->prepare("INSERT INTO clients (nomClient, prenomClient, adresseMailClient, mdpClient) VALUES (:nomClient, :prenomClient, :adresseMailClient, :mdpClient)");
		$insertClient->execute(array('nomClient' => $this->nomClient, 'prenomClient' => $this->prenomClient, 'adresseMailClient' => $this->adresseMailClient, 'mdpClient' => password_hash($this->mdpClient, PASSWORD_DEFAULT)));

	}

}

?>