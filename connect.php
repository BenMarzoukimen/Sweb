<?php
// Paramètres de connexion à la base de données
$servername = "localhost"; // Remplacez "localhost" par l'adresse de votre serveur MySQL
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL
$dbname = "db_ecommerce"; // Remplacez par le nom de votre base de données

// Connexion à la base de données
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$connection) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Vous êtes maintenant connecté à la base de données.
// Vous pouvez exécuter vos requêtes SQL à l'aide de la connexion "$conn".

// Exemple : Récupérer tous les utilisateurs depuis la table 'utilisateurs'
$query = "SELECT * FROM utilisateurs";
$result = mysqli_query($connection, $query);

// Traiter les résultats...
// ...

?>
  







