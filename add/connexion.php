<?php
// $serveur = "localhost";
// $utilisateur = "root";
// $mot_de_passe = "";
// $base_de_donnees = "maindatabase";

// Connexion
$connexion = new PDO('mysql:host=localhost;dbname=maindatabase','root','');
    // print "Connection etablie ";

// Vérification de la connexion
if (!$connexion) {
    die("Erreur de connexion : " . mysqli_connect_error());
}