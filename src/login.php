<?php
// Connexion à la base de données
$servername = "db";
$username = "user_login";
$password = "password_login";
$dbname = "db_login";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Vérifier la connexion
if (!$conn) {
	die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}

// Traitement du formulaire de connexion
if($_SERVER["REQUEST_METHOD"] == "POST") {
	// Récupération des données du formulaire
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Requête pour récupérer l'utilisateur correspondant dans la base de données
	$sql = "SELECT id, username, password FROM utilisateur WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);
	if ($result === false) {
		die("Erreur de requête: " . mysqli_error($conn));
	}
	$row = mysqli_fetch_assoc($result);
	if ($username === "admin" && $password === $row['password']) {
		// Rediriger l'utilisateur "ladamin" vers une page spéciale
		session_start();
		$_SESSION['id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		// header("Location: page_speciale.php");
		echo "<p>Bienvenue admin le flag est epictf{uneinjectionparmistantdautre}</p>";
		exit;
	} elseif(mysqli_num_rows($result) == 1) {
		// Utilisateur trouvé, vérifier le mot de passe
		if($password === $row['password']) {
			// Mot de passe correct, connecter l'utilisateur
			session_start();
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			// header("Location: accueil.php");
			echo "<p>Bonjour $username.</p>";
			exit;
		} else {
			// Mot de passe incorrect
			echo "<p>Mot de passe incorrect.</p>";
		}
	} else {
		// Utilisateur non trouvé
		echo "<p>Utilisateur non trouvé.</p>";
	}
	
	mysqli_close($conn);
}
?>