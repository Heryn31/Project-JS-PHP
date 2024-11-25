<?php


// Connexion
$connexion = new PDO('mysql:host=localhost;dbname=maindatabase','root','');

// Vérification de la connexion
if (!$connexion) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
?>