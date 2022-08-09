<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Se connecter</title>
</head>
<body>

	<?php 

	// Destruction des sessions lors de la déconnexion
	session_unset(); 

	?>

	<form action="retourConnexion.php" method="post">
		<label>Adresse mail : </label><input type="mail" name="mail" required><br><br>
		<label>Mot de passe : </label><input type="password" name="mdp" required><br><br>
		<input type="submit" name="btnConnexion" /><br>

		<!-- Création d'un compte si les valeurs saisies n'existent pas -->
		<br>
		<a href="creationComptes.html">Créer un compte</a>
	</form>
</body>
</html>