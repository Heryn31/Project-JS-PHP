<?php
include "connexion.php";

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    //SUPPRESSION DANS LA TABLE EXAMEN

    $sql="SELECT * FROM etudiant WHERE id='$id'";
    $req=$connexion->query($sql);
    $a_numero=$req->fetch();
    $numero=$a_numero['num_etudiant'];

    //REQUETE DE SUPPRESSION 

    $sql="DELETE FROM examen WHERE num_etudiant='$numero'";
    $req=$connexion->query($sql);

    if ($req->rowCount()>0){
        print "<script> alert ('Suppression dans la table examen effectuer')";

    }else{
        print "Error lors de la suppression dans la table examen";
    }

    //SUPPRESSION DANS LA TABLE ETUDIANT

    $sql_delete = $connexion->query("DELETE FROM `etudiant` WHERE `id`=$id");

    if ($sql_delete) {

        header("location:http://localhost/sujet/list/list.php");
    }else{
        print "<script> alert ('Erreur'); </script>";

    }
}
