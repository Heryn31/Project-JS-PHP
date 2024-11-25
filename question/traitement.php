<?php
include "connexion.php";
for ($i = 0; $i < 10; $i++) {
    //Requete sur la reponse de l'user
    $finals[$i] = $_GET["reponse$i"];
}

//Requete de la true reponse

$sql = "SELECT * FROM `qcm`";
$req = $connexion->query($sql);
while ($reponse = $req->fetch()) {
    $true_reponses[$i] = $reponse['true_reponse'];
    $i++;
}
//TEST DE L'ARRAY TRUE REPONSES
// foreach ($true_reponses as $true_reponse){
//     print "$true_reponse";
// }
if ($req->rowCount() > 0) {

    //Comparaison de la reponse de l'user et de la true_reponse contenu dans la BD;;;;
    $note = 0;
    foreach ($finals as $final) {
        foreach ($true_reponses as $true_reponse) {
            if ($final == $true_reponse) {
                $note++;
            }
        }
    }

    //Ajout du note dans la case de l'etudiant 

    $sql = "SELECT note FROM `examen` WHERE statut='1'";
    $req = $connexion->query($sql);
    if ($req->rowCount() == 1) {

        //Ajout du note dans la table examen
        $sql = "UPDATE `examen` SET note='$note' WHERE statut='1'";
        $req = $connexion->query($sql); 
    } else {
        print "Aucun utilisateur actif trouver";
    }
    $sql = "SELECT note FROM `etudiant` WHERE statut='1'";
    $req= $connexion->query($sql);
    if ($req->rowCount()==1){

        //Ajout dans la table etudiant du note 
        $sql = "UPDATE `etudiant` SET note='$note' WHERE statut='1'";
        $req = $connexion->query($sql);
    }else{
        print "Aucun utilisateur actif trouver dans la table etudiant";
    }
} else {
    print "<script>alert ('Aucun bonne reponses trouver dans la BD');</script>";
}
header("location:http://localhost/sujet/etudiant/etudiant.php");
?>