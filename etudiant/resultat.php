<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resultat.css">
    <title>Resultat</title>
</head>

<body>
    <?php

    include "connexion.php";

    $sql = "SELECT * FROM `examen` WHERE statut='1'";
    $req = $connexion->query($sql);
    $result = $req->fetch();
    $note = $result['note'];

    $sql = "SELECT * FROM etudiant WHERE statut='1'";
    $req = $connexion->query($sql);
    $result2 = $req->fetch();
    $nom = $result2['Nom'];
    $pnom = $result2['Prenom'];


    if ($note < 5) {
    ?>
        <div class="main">
            <h3 class="titre">😥Vous aviez pas eu la moyenne</h3><br>
            <p class="note bas"><?= $note ?>/10</p>
            <div class="retour">

                <a href="http://localhost/sujet/etudiant/etudiant.php" class="link"><button class="but">Suivant</button></a>

            </div>
        </div>
    <?php
    } elseif ($note >= 5 and $note < 10) {
    ?>
        <div class="main">
            <div class="contain">
                <h3 class="titre">🙌Bravo, la moyenne</h3><br>
                <p class="note moy"><?= $note ?>/10</p>
            </div>
            <div class="retour">

                <a href="http://localhost/sujet/etudiant/etudiant.php" class="link"><button class="but">Suivant</button></a>

            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="main">
            <h3 class="titre">🎊Parfaite note, continuer comme ca!!</h3><br>
            <p class="note haut"><?= $note ?>/10</p>
            <div class="retour">

                <a href="http://localhost/sujet/etudiant/etudiant.php" class="link"><button class="but">Suivant</button></a>


            </div>
        </div>
    <?php
    }

    //ENVOI PAR EMAIL DE LA NOTE DE L'ETUDIANT

    //RECHERCHE DU L'EMAIL DE L'ETUDIANT ACTIF
    $sql = "SELECT * FROM `etudiant` WHERE statut='1'";
    $req = $connexion->query($sql);
    $resultat = $req->fetch();
    $email = $resultat['adr_email'];


    //Php Mailer

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPmailer.php';
    require 'phpmailer/src/SMTP.php';

    require "autoload.php";

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        //ADMIN
        $mail->Username = 'testsmt9000@gmail.com';

        $mail->Password = 'pmvr vyaw aenw dzaz';
        //CODE DE L'APP GMAIL

        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->SMTPAuth = true;

        $mail->setFrom('testsmt9000@gmail.com');
        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = 'Resultat de l\'examen qcm';
        if ($note < 5 && $note != -1) {
            $mail->Body = '<div class="container">
            <h3>Bonjour ' . $pnom . ' ' . $nom . 'Votre note de l\'examen QCM est: <div style="color: red; font-size: 33px">' . $note . '/10 </div><br>Dommage, vous n\'avez pas eu la moyenne <br><br><br>  L\'equipe de gestion des questionnaires</h3>
        </div>';
        } else {
            $mail->Body = '<div class="container">
        <h3>Bonjour ' . $pnom . ' ' . $nom . ' <br>Votre note de l\'examen QCM est: <div style="color: green; font-size: 33px">' . $note . '/10</div><br> Felicitatio,Vous avez reussi a obtenir la moyenne <br><br><br>L\'equipe de gestion des questionnaires</h3>
    </div>';
        }

        $mail->SMTPDebug = 0;
        $error = $mail->ErrorInfo;

        $mail->send();

        print "<script> alert ('Votre note a ete envoyer sur $email sur le nom de $pnom $nom'); </script>";
    } catch (Exception $e) {
        print "<script> alert ('Message non envoyer sur $email'); </script>";
    }
    ?>

</body>


</html>
<!-- <div class="container">
    <h3>Votre note de l\'examen qcm est: ' . $note . '/10.<br> L\'equipe de gestion des questionnaires</h3>
</div> -->