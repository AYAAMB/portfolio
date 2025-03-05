<?php
$host = "localhost";
$dbname = "web"; // Nom de la base de données
$username = "root";  // Par défaut sur XAMPP
$password = "";  // Mot de passe vide sur XAMPP

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
