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
	$sql = "SELECT id, username, password FROM utilisateur WHERE username = ' . $username .'";
	$result = mysqli_query($conn, $sql);
	if ($result == TRUE) {
		echo "bienvenue: $username";
		foreach($result as $row) {
			print_r($row);
		}
	} else {
		echo "<p>Utilisateur incorrect</p>";
	}
	mysqli_close($conn);
}
?>