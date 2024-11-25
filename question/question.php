<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="question.css">
    <title>Question</title>
</head>

<body>
    <div class="side_left">

        <h3 class="main_titre">Qcm</h3>

    </div>
    <form method="get" class="side_right" action="traitement.php">

        <?php

        include "connexion.php";
        $sql = 'SELECT * FROM `qcm` ORDER BY RAND() LIMIT 10';
        $qcm = $connexion->query($sql);
        $number = 0;
        $score = 0;
        $n = 0;
        $id_relate = 0;

        if ($qcm->rowCount() > 0) {
            while ($reponse = $qcm->fetch()) {
                $number_question = $number + 1;
        ?>
                <h3 class="titre"><?= $number_question ?>:
                    <?= $reponse['question'] ?>
                </h3>
                <?php
                $true_reponses[$n] = $reponse['true_reponse'];
                $n++;

                $options = [$reponse['true_reponse'], $reponse['reponse2'], $reponse['reponse3'], $reponse['reponse4'],];
                shuffle($options);
                foreach ($options as $option) {
                ?>

                    <div class="one_reponse">
                        <input type="radio" name="reponse<?= $number ?>" value="<?= $option ?>" class="radio" id="radio<?= $id_relate ?>" required><label for="radio<?= $id_relate ?>"><?= $option ?></label><br>
                    </div>
        <?php
                    $id_relate++;
                }
                $number++;
            }
        }
        

        ?>
        <div class="action">
            <input type="reset" value="Reset" class="reset">
            <input type="submit" value="Envoyer" name="envoyer" class="envoyer">

        </div>
    </form>
</body>

</html>