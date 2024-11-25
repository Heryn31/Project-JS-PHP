<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_question.css">
    <title>Question</title>
</head>

<body>
    <h1 class="titre_add"> Modifier Question</h1>
    <form method="post">
        <?php
        include "connexion.php";
        $id=$_GET['update_id'];
        $sql="SELECT * FROM `qcm` WHERE num_question ='$id'";
        $req=$connexion->query($sql);
        if ($req->rowCount()>0){
            while($use=$req->fetch()){
                $question=$use['question'];
                $true_reponse=$use['true_reponse'];
                $reponse2=$use['reponse2'];
                $reponse3=$use['reponse3'];
                $reponse4=$use['reponse4'];
            }
        }


        ?>

        <input type="text" name="question" id="Question" placeholder="Question" class="question fill" required autocomplete="off" value="<?= $question?>"><br><br>
        <input type="text" name="true_reponse" id="true_reponse" placeholder="true_reponse" class="true_reponse fill" required autocomplete="off" value="<?= $true_reponse?>"><br><br>
        <input type="text" name="Reponse2" id="Reponse2" placeholder="Reponse2" class="Reponse2 fill" required autocomplete="off" value="<?= $reponse2?>"><br><br>
        <input type="text" name="Reponse3" id="Reponse3" placeholder="Reponse3" class="Reponse3 fill" required autocomplete="off" value="<?= $reponse3?>"><br><br>
        <input type="text" name="Reponse4" id="Reponse4" placeholder="Reponse4" class="Reponse4 fill" required autocomplete="off" value="<?= $reponse4?>"><br><br>
        <input type="reset" value="Reset" class="reset go">
        <input type="submit" value="Enregistrer" class="save go" name="valider"><br><br>

    </form>
    <a href="http://localhost/sujet/admin/admin_question.php" class="return"><button class="return_but">Voir les questions</button></a>

</body>

<?php

if (isset($_POST['valider'])) {
    $question = $_POST['question'];
    $true_reponse = $_POST['true_reponse'];
    $reponse2 = $_POST['Reponse2'];
    $reponse3 = $_POST['Reponse3'];
    $reponse4 = $_POST['Reponse4'];


    $res = $connexion->query("UPDATE `qcm` SET num_question='$id',question='$question',true_reponse='$true_reponse',reponse2='$reponse2',reponse3='$reponse3',reponse4='$reponse4' WHERE num_question='$id'");
    header("location:http://localhost/sujet/admin/admin_question.php");
}
?>

</html>