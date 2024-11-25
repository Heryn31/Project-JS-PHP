<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_question.css">
    <title>Les questions</title>
</head>

<body>

    <div class="panel">
        <h3 class="nav">Menu</h3>
        <a href="http://localhost/sujet/admin/add_question.php"><button class="menu">Ajouter un question</button></a>
        <a href="http://localhost/sujet/admin/dashboard.php"><button class="menu">Menu Principal</button></a>
    </div>
    <table class="maintable">
        <tr class="table main">

            <td class="table num">Numero</td>
            <td class="table nom">Question</td>
            <td class="table">Vrai reponses</td>
            <td class="table">Reponses2</td>
            <td class="table">Reponses3</td>
            <td class="table">Reponses4</td>
            <td class="table">Niveau</td>
            <td class="table niveau">Action</td>


        </tr>

        <?php

        include "connexion.php";
        $counter = 0;
        $sql = 'SELECT * FROM `qcm`';
        $req = $connexion->query($sql);
        while ($use = $req->fetch()) {
        ?>
            <tr>

                <td class="table num"><?= $use['num_question'] ?></td>
                <td class="table nom"><?= $use['question'] ?></td>
                <td class="table"><?= $use['true_reponse'] ?></td>
                <td class="table"><?= $use['reponse2'] ?></td>
                <td class="table"><?= $use['reponse3'] ?></td>
                <td class="table"><?= $use['reponse4'] ?></td>
                <td class="table niveau"><?= $use['Niveau'] ?></td>
                <td class="table action">
                    <a href="http://localhost/sujet/admin/update_question.php?update_id=<?= $use['num_question'] ?>"><button class="modifier">Modifier</button></a>
                    <a href="http://localhost/sujet/admin/delete_question.php?delete_id=<?= $use['num_question'] ?>"><button class="supprimer">Supprimer</button></a>
                </td>

            </tr>
        <?php
            $counter += 1;
        }
        ?><div class="totalmain">
            <p class="total">Total: <?= $counter ?> Questions</p><br>
            <hr>
        </div>

        <?php
        if ($counter < 10) {
        ?>
            <p class="error">Nombre de question insuffisant pour l'examen

            </p>
        <?php
        }
        ?>
    </table>

</body>

</html>