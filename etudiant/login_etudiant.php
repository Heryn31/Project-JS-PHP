<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_etudiant.css">
    <title>S'enregistrer</title>
</head>

<body>

    <div class="container">
        <form method="get">
            <h1 class="titre">Remplir les informations suivant: </h1>
            <!-- <h1 class="titre">Remplir les informations suivant: </h1> -->
            <input type="text" name="numero" id="text" required placeholder="Numero d'etudiant" autocomplete="off"><br><br>
            <input type="text" name="prenom" id="text" required placeholder="Votre Prenom"><br><br>



            <?php

            include "connexion.php";

            if (isset($_GET['valider'])) {

                $numero = $_GET['numero'];
                $prenom = $_GET['prenom'];

                //INITIALISATION DE LA STATUT DE LA TABLE EXAMEN ET ETUDIANT::

                $sql_exam = "UPDATE examen SET statut='0' WHERE statut='1'";
                $req0 = $connexion->query($sql_exam);

                $sql_etudiant = "UPDATE etudiant SET statut='0' WHERE statut='1'";
                $req1 = $connexion->query($sql_etudiant);

                //RECHERCHE DE CORRESPONDANCE DANS LA TABLE

                $sql = "SELECT * FROM `examen` WHERE num_etudiant='$numero'";
                $req = $connexion->query($sql);

                $sql = "SELECT * FROM etudiant WHERE Prenom='$prenom'";
                $req2 = $connexion->query($sql);

                if ($req->rowCount() > 0 && $req2->rowCount() > 0) { //Si l'etudiant est contenu dans la table examen: numero et nom correspondant dans la bd

                    $sql = "UPDATE examen SET statut='1' WHERE num_etudiant='$numero'";
                    $req1 = $connexion->query($sql);
                    $sql = "UPDATE etudiant SET statut='1' WHERE num_etudiant='$numero'";
                    $req2 = $connexion->query($sql);
                    //TEST DE LA MISE A JOUR DE STATUT
                    // if ($req1->rowCount() > 0 and $req2->rowCount() > 0) {
                    //     print "<script> alert ('Statut activer');</script>";
                    // } else {
                    //     print "<script> alert ('Statut echoer');</script>";
                    // }
                    header("location:http://localhost/sujet/etudiant/etudiant.php");
                } else {
                    //RECHERCHE DE LA CORRESPONDANCE DANS LA TABLE ETUDIANT::
                    $sql = "SELECT * FROM etudiant WHERE num_etudiant='$numero'";
                    $req = $connexion->query($sql);
                    $sql = "SELECT * FROM etudiant WHERE Prenom='$prenom'";
                    $req0 = $connexion->query($sql);

                    if ($req->rowCount() > 0 && $req0->rowCount() > 0) {
                        //INSERTION DE L'ETUDIANT DANS LA TABLE EXAMEN
                        $sql = "INSERT INTO `examen`(`num_etudiant`, `annee_univ`, `note`, `statut`) VALUES ('$numero','2023-2024','-1','1')"; // Statut 1 signifie== online
                        $req = $connexion->query($sql);
                        //MISE A JOUR DE LA STATUT DANS LA TABLE ETUDIANT
                        $sql = "UPDATE etudiant SET statut='1' WHERE num_etudiant='$numero'";
                        $req2 = $connexion->query($sql);
                        // if ($req->rowCount() > 0) {
                        //     print "Mise a jour de la table etudiant effectuer";
                        // } else {
                        //     print "Erreur de mise a jour de la table etudiant";
                        // }
                    }
                    
                    if ($req->rowCount() > 0 and $req2->rowCount() > 0) {
                        header("location:http://localhost/sujet/etudiant/etudiant.php");
                    } else {
                        print "<script> alert ('Etudiant introuvable'); </script>";
                    }
                }
            }


            ?>
            <input type="reset" value="Reset" class="format but">
            <input type="submit" value="Valider" class="valider but" name="valider">

        </form>

        <a href="http://localhost/sujet/main.php" class="return"><button class="but">Retour</button></a>


</body>
</body>

</html>